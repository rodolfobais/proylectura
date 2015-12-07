<?php
/**
 * DOMPDF - PHP5 HTML to PDF renderer
 *
 * File: $RCSfile: dompdf.cls.php,v $
 * Created on: 2004-06-09
 *
 * Copyright (c) 2004 - Benj Carson <benjcarson@digitaljunkies.ca>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this library in the file LICENSE.LGPL; if not, write to the
 * Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA
 * 02111-1307 USA
 *
 * Alternatively, you may distribute this software under the terms of the
 * PHP License, version 3.0 or later.  A copy of this license should have
 * been distributed with this file in the file LICENSE.PHP .  If this is not
 * the case, you can obtain a copy at http://www.php.net/license/3_0.txt.
 *
 * The latest version of DOMPDF might be available at:
 * http://www.dompdf.com/
 *
 * @link http://www.dompdf.com/
 * @copyright 2004 Benj Carson
 * @author Benj Carson <benjcarson@digitaljunkies.ca>
 * @package dompdf

 */

/* $Id: dompdf.cls.php 4474 2012-01-30 12:22:27Z cburela $ */

/**
 * DOMPDF - PHP5 HTML to PDF renderer
 *
 * DOMPDF loads HTML and does its best to render it as a PDF.  It gets its
 * name from the new DomDocument PHP5 extension.  Source HTML is first
 * parsed by a DomDocument object.  DOMPDF takes the resulting DOM tree and
 * attaches a {@link Frame} object to each node.  {@link Frame} objects store
 * positioning and layout information and each has a reference to a {@link
 * Style} object.
 *
 * Style information is loaded and parsed (see {@link Stylesheet}) and is
 * applied to the frames in the tree by using XPath.  CSS selectors are
 * converted into XPath queries, and the computed {@link Style} objects are
 * applied to the {@link Frame}s.
 *
 * {@link Frame}s are then decorated (in the design pattern sense of the
 * word) based on their CSS display property ({@link
 * http://www.w3.org/TR/CSS21/visuren.html#propdef-display}).
 * Frame_Decorators augment the basic {@link Frame} class by adding
 * additional properties and methods specific to the particular type of
 * {@link Frame}.  For example, in the CSS layout model, block frames
 * (display: block;) contain line boxes that are usually filled with text or
 * other inline frames.  The Block_Frame_Decorator therefore adds a $lines
 * property as well as methods to add {@link Frame}s to lines and to add
 * additional lines.  {@link Frame}s also are attached to specific
 * Positioner and {@link Frame_Reflower} objects that contain the
 * positioining and layout algorithm for a specific type of frame,
 * respectively.  This is an application of the Strategy pattern.
 *
 * Layout, or reflow, proceeds recursively (post-order) starting at the root
 * of the document.  Space constraints (containing block width & height) are
 * pushed down, and resolved positions and sizes bubble up.  Thus, every
 * {@link Frame} in the document tree is traversed once (except for tables
 * which use a two-pass layout algorithm).  If you are interested in the
 * details, see the reflow() method of the Reflower classes.
 *
 * Rendering is relatively straightforward once layout is complete. {@link
 * Frame}s are rendered using an adapted {@link Cpdf} class, originally
 * written by Wayne Munro, http://www.ros.co.nz/pdf/.  (Some performance
 * related changes have been made to the original {@link Cpdf} class, and
 * the {@link CPDF_Adapter} class provides a simple, stateless interface to
 * PDF generation.)  PDFLib support has now also been added, via the {@link
 * PDFLib_Adapter}.
 *
 *
 * @package dompdf
 */
class DOMPDF {

  /**
   * DomDocument representing the HTML document
   *
   * @var DomDocument
   */
  protected $_xml;

  /**
   * Frame_Tree derived from the DOM tree
   *
   * @var Frame_Tree
   */
  protected $_tree;

  /**
   * Stylesheet for the document
   *
   * @var Stylesheet
   */
  protected $_css;

  /**
   * Actual PDF renderer
   *
   * @var Canvas
   */
  protected $_pdf;

  /**
   * Desired paper size ('letter', 'legal', 'A4', etc.)
   *
   * @var string
   */
  protected $_paper_size;

  /**
   * Paper orientation ('portrait' or 'landscape')
   *
   * @var string
   */
  protected $_paper_orientation;

  /**
   * Callbacks on new page and new element
   *
   * @var array
   */
  protected $_callbacks;

  /**
   * Experimental caching capability
   *
   * @var string
   */
  private $_cache_id;

  /**
   * Base hostname
   *
   * Used for relative paths/urls
   * @var string
   */
  protected $_base_host;

  /**
   * Absolute base path
   *
   * Used for relative paths/urls
   * @var string
   */
  protected $_base_path;

  /**
   * Protcol used to request file (file://, http://, etc)
   *
   * @var string
   */
  protected $_protocol;
  
  /**
   * Timestamp of the script start time
   * 
   * @var int 
   */
  private $_start_time = null;
  
  /**
   * @var string The system's locale
   */
  private $_system_locale = null;
  
  /**
   * @var bool Tells if the system's locale is the C standard one
   */
  private $_locale_standard = false;

  /**
   * Class constructor
   */
  function __construct() {
    $this->_locale_standard = sprintf('%.1f', 1.0) == '1.0';
    
    $this->save_locale();
    
    $this->_messages = array();
    $this->_xml = new DOMDocument();
    $this->_xml->preserveWhiteSpace = true;
    $this->_tree = new Frame_Tree($this->_xml);
    $this->_css = new Stylesheet();
    $this->_pdf = null;
    $this->_paper_size = "letter";
    $this->_paper_orientation = "portrait";
    $this->_base_protocol = "";
    $this->_base_host = "";
    $this->_base_path = "";
    $this->_callbacks = array();
    $this->_cache_id = null;
    
    $this->restore_locale();
  }
  
  /**
   * Class destructor
   */
  function __destruct() {
    clear_object($this);
  }
  
  /**
   * Save the system's locale configuration and 
   * set the right value for numeric formatting
   */
  private function save_locale() {
    if ( $this->_locale_standard ) return;
    
    $this->_system_locale = setlocale(LC_NUMERIC, "C");
  }
  
  /**
   * Restore the system's locale configuration
   */
  private function restore_locale() {
    if ( $this->_locale_standard ) return;
    
    setlocale(LC_NUMERIC, $this->_system_locale);
  }

  /**
   * Returns the underlying {@link Frame_Tree} object
   *
   * @return Frame_Tree
   */
  function get_tree() { return $this->_tree; }

  /**
   * Sets the protocol to use
   * FIXME validate these
   * 
   * @param string $proto
   */
  function set_protocol($proto) { $this->_protocol = $proto; }

  /**
   * Sets the base hostname
   *
   * @param string $host
   */
  function set_host($host) { $this->_base_host = $host; }

  /**
   * Sets the base path
   *
   * @param string $path
   */
  function set_base_path($path) { $this->_base_path = $path; }

  /**
   * Returns the protocol in use
   *
   * @return string
   */
  function get_protocol() { return $this->_protocol; }

  /**
   * Returns the base hostname
   *
   * @return string
   */
  function get_host() { return $this->_base_host; }

  /**
   * Returns the base path
   *
   * @return string
   */
  function get_base_path() { return $this->_base_path; }

  /**
   * Return the underlying Canvas instance (e.g. CPDF_Adapter, GD_Adapter)
   *
   * @return Canvas
   */
  function get_canvas() { return $this->_pdf; }

  /**
   * Returns the callbacks array
   *
   * @return array
   */
  function get_callbacks() { return $this->_callbacks; }

  /**
   * Loads an HTML file
   *
   * Parse errors are stored in the global array _dompdf_warnings.
   *
   * @param string $file a filename or url to load
   */
  function load_html_file($file) {
    $this->save_locale();
    
    // Store parsing warnings as messages (this is to prevent output to the
    // browser if the html is ugly and the dom extension complains,
    // preventing the pdf from being streamed.)
    if ( !$this->_protocol && !$this->_base_host && !$this->_base_path )
      list($this->_protocol, $this->_base_host, $this->_base_path) = explode_url($file);

    if ( !DOMPDF_ENABLE_REMOTE &&
         ($this->_protocol != "" && $this->_protocol !== "file://" ) )
      throw new DOMPDF_Exception("Remote file requested, but DOMPDF_ENABLE_REMOTE is false.");

    if ($this->_protocol == "" || $this->_protocol === "file://") {

      $realfile = realpath($file);
      if ( !$file )
        throw new DOMPDF_Exception("File '$file' not found.");

      if ( strpos($realfile, DOMPDF_CHROOT) !== 0 )
        throw new DOMPDF_Exception("Permission denied on $file.");

      // Exclude dot files (e.g. .htaccess)
      if ( substr(basename($realfile),0,1) === "." )
        throw new DOMPDF_Exception("Permission denied on $file.");

      $file = $realfile;
    }

    $contents = file_get_contents($file);
    $encoding = null;

    // See http://the-stickman.com/web-development/php/getting-http-response-headers-when-using-file_get_contents/
    if ( isset($http_response_header) ) {
      foreach($http_response_header as $_header) {
        if ( preg_match("@Content-Type:\s*[\w/]+;\s*?charset=([^\s]+)@i", $_header, $matches) ) {
          $encoding = strtoupper($matches[1]);
          break;
        }
      }
    }
    
    $this->restore_locale();
    
    $this->load_html($contents, $encoding);
  }

  /**
   * Loads an HTML string
   *
   * Parse errors are stored in the global array _dompdf_warnings.
   *
   * @param string $str HTML text to load
   */
  function load_html($str, $encoding = null) {
    $this->save_locale();
    
    // TODO: use the $encoding variable
    // FIXME: Determine character encoding, switch to UTF8, update meta tag. Need better http/file stream encoding detection, currently relies on text or meta tag.
    mb_detect_order('auto');
    
    if (mb_detect_encoding($str) !== 'UTF-8') {
      $metatags = array(
        '@<meta\s+http-equiv="Content-Type"\s+content="(?:[\w/]+)(?:;\s*?charset=([^\s"]+))?@i',
        '@<meta\s+content="(?:[\w/]+)(?:;\s*?charset=([^\s"]+))"?\s+http-equiv="Content-Type"@i',
      );
      
      foreach($metatags as $metatag) {
        if (preg_match($metatag, $str, $matches)) break;
      }
        
      if (mb_detect_encoding($str) == '') {
        if (isset($matches[1])) {
          $encoding = strtoupper($matches[1]);
        } else {
          $encoding = 'UTF-8';
        }
      } else {
        if (isset($matches[1])) {
          $encoding = strtoupper($matches[1]);
        } else {
          $encoding = 'auto';
        }
      }
      
      if ($encoding !== 'UTF-8') { 
        $str = mb_convert_encoding($str, 'UTF-8', $encoding); 
      }
      
      if (isset($matches[1])) {
        $str = preg_replace('/charset=([^\s"]+)/i','charset=UTF-8', $str);
      } else {
        $str = str_replace('<head>', '<head><meta http-equiv="Content-Type" content="text/html;charset=UTF-8">', $str);
      }
    }

    // Parse embedded php, first-pass
    if ( DOMPDF_ENABLE_PHP ) {
      ob_start();
      eval("?" . ">$str");
      $str = ob_get_clean();
    }
    
    // if the document contains non utf-8 with a utf-8 meta tag chars and was 
    // detected as utf-8 by mbstring, problems could happen.
    // http://devzone.zend.com/article/8855
    if ( $encoding === 'UTF-8' ) {
      $str = preg_replace("/<meta([^>]+)>/", "", $str);
    }
    
    // Store parsing warnings as messages
    set_error_handler("record_warnings");
    
    $this->_xml->loadHTML($str);
    restore_error_handler();
    
    /**
    @todo Take the quirksmode into account
    // http://hsivonen.iki.fi/doctype/
    // https://developer.mozilla.org/en/mozilla's_quirks_mode
    $quirksmode = false;
    
    // HTML5 <!DOCTYPE html>
    if ( !$this->_xml->doctype->publicId && !$this->_xml->doctype->systemId ) {
      $quirksmode = false;
    }
    
    // not XHTML
    if ( !preg_match("/xhtml/i", $this->_xml->doctype->publicId) ) {
      $quirksmode = true;
    }
    */
    
    $this->restore_locale();
  }

  /**
   * Builds the {@link Frame_Tree}, loads any CSS and applies the styles to
   * the {@link Frame_Tree}
   */
  protected function _process_html() {
    $this->save_locale();
    
    $this->_tree->build_tree();

    $this->_css->load_css_file(Stylesheet::DEFAULT_STYLESHEET);

    $acceptedmedia = Stylesheet::$ACCEPTED_GENERIC_MEDIA_TYPES;
    if ( defined("DOMPDF_DEFAULT_MEDIA_TYPE") ) {
      $acceptedmedia[] = DOMPDF_DEFAULT_MEDIA_TYPE;
    } else {
      $acceptedmedia[] = Stylesheet::$ACCEPTED_DEFAULT_MEDIA_TYPE;
    }
          
    // load <link rel="STYLESHEET" ... /> tags
    $links = $this->_xml->getElementsByTagName("link");
    foreach ($links as $link) {
      if ( mb_strtolower($link->getAttribute("rel")) === "stylesheet" ||
           mb_strtolower($link->getAttribute("type")) === "text/css" ) {
        //Check if the css file is for an accepted media type
        //media not given then always valid
        $formedialist = preg_split("/[\s\n,]/", $link->getAttribute("media"),-1, PREG_SPLIT_NO_EMPTY);
        if ( count($formedialist) > 0 ) {
          $accept = false;
          foreach ( $formedialist as $type ) {
            if ( in_array(mb_strtolower(trim($type)), $acceptedmedia) ) {
              $accept = true;
              break;
            }
          }
          if (!$accept) {
            //found at least one mediatype, but none of the accepted ones
            //Skip this css file.
            continue;
          }
        }
           
        $url = $link->getAttribute("href");
        $url = build_url($this->_protocol, $this->_base_host, $this->_base_path, $url);

        $this->_css->load_css_file($url);
      }

    }

    // load <style> tags
    $styles = $this->_xml->getElementsByTagName("style");
    foreach ($styles as $style) {

      // Accept all <style> tags by default (note this is contrary to W3C
      // HTML 4.0 spec:
      // http://www.w3.org/TR/REC-html40/present/styles.html#adef-media
      // which states that the default media type is 'screen'
      if ( $style->hasAttributes() &&
           ($media = $style->getAttribute("media")) &&
           !in_array($media, $acceptedmedia) )
        continue;

      $css = "";
      if ( $style->hasChildNodes() ) {

        $child = $style->firstChild;
        while ( $child ) {
          $css .= $child->nodeValue; // Handle <style><!-- blah --></style>
          $child = $child->nextSibling;
        }

      } else
        $css = $style->nodeValue;
      
      // Set the base path of the Stylesheet to that of the file being processed
      $this->_css->set_protocol($this->_protocol);
      $this->_css->set_host($this->_base_host);
      $this->_css->set_base_path($this->_base_path);

      $this->_css->load_css($css);
    }
    
    $this->restore_locale();
  }

  /**
   * Sets the paper size & orientation
   *
   * @param string $size 'letter', 'legal', 'A4', etc. {@link CPDF_Adapter::$PAPER_SIZES}
   * @param string $orientation 'portrait' or 'landscape'
   */
  function set_paper($size, $orientation = "portrait") {
    $this->_paper_size = $size;
    $this->_paper_orientation = $orientation;
  }

  /**
   * Enable experimental caching capability
   * @access private
   */
  function enable_caching($cache_id) {
    $this->_cache_id = $cache_id;
  }

  /**
   * Sets callbacks for events like rendering of pages and elements.
   * The callbacks array contains arrays with 'event' set to 'begin_page',
   * 'end_page', 'begin_frame', or 'end_frame' and 'f' set to a function or
   * object plus method to be called.
   *
   * The function 'f' must take an array as argument, which contains info
   * about the event.
   *
   * @param array $callbacks the set of callbacks to set
   */
  function set_callbacks($callbacks) {
    if (is_array($callbacks)) {
      $this->_callbacks = array();
      foreach ($callbacks as $c) {
        if (is_array($c) && isset($c['event']) && isset($c['f'])) {
          $event = $c['event'];
          $f = $c['f'];
          if (is_callable($f) && is_string($event)) {
            $this->_callbacks[$event][] = $f;
          }
        }
      }
    }
  }

  /**
   * Renders the HTML to PDF
   */
  function render() {
    $this->save_locale();
    
    if ( DOMPDF_LOG_OUTPUT_FILE ) {
      if ( !file_exists(DOMPDF_LOG_OUTPUT_FILE) && is_writable(dirname(DOMPDF_LOG_OUTPUT_FILE)) ) {
        touch(DOMPDF_LOG_OUTPUT_FILE);
       // echo "'".DOMPDF_LOG_OUTPUT_FILE."'";die;
      }else{
      	//echo "FALSE ".DOMPDF_LOG_OUTPUT_FILE;die;
      }
      //echo "'".DOMPDF_LOG_OUTPUT_FILE."'";die;
      $this->_start_time = microtime(true);
      ob_start();
    }

    //enable_mem_profile();

    $this->_process_html();
    
    $this->_css->apply_styles($this->_tree);
    
    $root = null;

    foreach ($this->_tree->get_frames() as $frame) {
      // Set up the root frame

      if ( is_null($root) ) {
        $root = Frame_Factory::decorate_root( $this->_tree->get_root(), $this );
        continue;
      }

      // Create the appropriate decorators, reflowers & positioners.
      $deco = Frame_Factory::decorate_frame($frame, $this);
      $deco->set_root($root);

      // FIXME: handle generated content
      if ( $frame->get_style()->display === "list-item" ) {

        // Insert a list-bullet frame
        $node = $this->_xml->createElement("bullet"); // arbitrary choice
        $b_f = new Frame($node);

        $parent_node = $frame->get_parent()->get_node();

        if ( !$parent_node->hasAttribute("dompdf-children-count") ) {
          $count = 0;
          foreach ($parent_node->childNodes as $_node) {
            if ( $_node instanceof DOMElement )
              $count++;
          }
          $parent_node->setAttribute("dompdf-children-count", $count);
        }

        $index = 0;
        if ( !$parent_node->hasAttribute("dompdf-counter") ) {
          $index = 1;
          $parent_node->setAttribute("dompdf-counter", 1);
        }
        else {
          $index = $parent_node->getAttribute("dompdf-counter");
          $index++;
          $parent_node->setAttribute("dompdf-counter", $index);
        }
        
        $node->setAttribute("dompdf-counter", $index);
        $style = $this->_css->create_style();
        $style->display = "-dompdf-list-bullet";
        $style->inherit($frame->get_style());
        $b_f->set_style($style);

        $deco->prepend_child( Frame_Factory::decorate_frame($b_f, $this) );
      }

    }
    
    $page_style = $this->_css->get_page_style();
    
    if ( $page_style && is_array($page_style->size) ) {
      $this->set_paper(array(0, 0, $page_style->size[0], $page_style->size[1]));
    }
    
    $this->_pdf = Canvas_Factory::get_instance($this->_paper_size, $this->_paper_orientation);

    // Add meta information
    $title = $this->_xml->getElementsByTagName("title");
    if ( $title->length ) {
      $this->_pdf->add_info("Title", trim($title->item(0)->nodeValue));
    }
    
    $metas = $this->_xml->getElementsByTagName("meta");
    $labels = array(
      "author" => "Author",
      "keywords" => "Keywords",
      "description" => "Subject",
    );
    foreach($metas as $meta) {
      $name = mb_strtolower($meta->getAttribute("name"));
      if ( isset($labels[$name]) ) {
        $this->_pdf->add_info($labels[$name], trim($meta->getAttribute("content")));
      }
    }
    
    $root->set_containing_block(0, 0, $this->_pdf->get_width(), $this->_pdf->get_height());
    $root->set_renderer(new Renderer($this));

    // This is where the magic happens:
    $root->reflow();

    // Clean up cached images
    Image_Cache::clear();
    
    global $_dompdf_warnings, $_dompdf_show_warnings;
    if ( $_dompdf_show_warnings ) {
      echo '<b>DOMPDF Warnings</b><br><pre>';
      foreach ($_dompdf_warnings as $msg)
        echo $msg . "\n";
      echo $this->get_canvas()->get_cpdf()->messages;
      echo '</pre>';
      flush();
    }
    
    $this->restore_locale();
  }

  /**
   * Add meta information to the PDF after rendering
   */
  function add_info($label, $value) {
    if (!is_null($this->_pdf))
      $this->_pdf->add_info($label, $value);
  }

  /**
   * Writes the output buffer in the log file
   * @return void
   */
  private function write_log() {
    if ( !DOMPDF_LOG_OUTPUT_FILE || !is_writable(DOMPDF_LOG_OUTPUT_FILE) ) return;
    
    $memory = DOMPDF_memory_usage();
    $memory = number_format($memory/1024);
    $time = number_format((microtime(true) - $this->_start_time) * 1000, 4);
    
    $out = "<span style='color: #900'>$memory KB</span>    ".
    "<span style='color: #090'>$time ms</span><br />";
    
    $out .= ob_get_clean();
    //file_put_contents(DOMPDF_LOG_OUTPUT_FILE, $out);
  }

  /**
   * Streams the PDF to the client
   *
   * The file will open a download dialog by default.  The options
   * parameter controls the output.  Accepted options are:
   *
   * 'Accept-Ranges' => 1 or 0 - if this is not set to 1, then this
   *    header is not included, off by default this header seems to
   *    have caused some problems despite the fact that it is supposed
   *    to solve them, so I am leaving it off by default.
   *
   * 'compress' = > 1 or 0 - apply content stream compression, this is
   *    on (1) by default
   *
   * 'Attachment' => 1 or 0 - if 1, force the browser to open a
   *    download dialog, on (1) by default
   *
   * @param string $filename the name of the streamed file
   * @param array  $options header options (see above)
   */
  function stream($filename, $options = null) {
    $this->save_locale();
    
    $this->write_log();
    
    if (!is_null($this->_pdf))
      $this->_pdf->stream($filename, $options);
      
    $this->restore_locale();
  }

  /**
   * Returns the PDF as a string
   *
   * The file will open a download dialog by default.  The options
   * parameter controls the output.  Accepted options are:
   *
   *
   * 'compress' = > 1 or 0 - apply content stream compression, this is
   *    on (1) by default
   *
   *
   * @param array  $options options (see above)
   * @return string
   */
  function output($options = null) {
    $this->save_locale();
    
    $this->write_log();

    if ( is_null($this->_pdf) )
      return null;

    $output = $this->_pdf->output( $options );
    
    $this->restore_locale();
    
    return $output;
  }

  /**
   * Returns the underlying HTML document as a string
   *
   * @return string
   */
  function output_html() {
    return $this->_xml->saveHTML();
  }
}
