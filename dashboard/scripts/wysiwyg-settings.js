/********************************************************************
 * openWYSIWYG settings file Copyright (c) 2006 openWebWare.com
 * Contact us at devs@openwebware.com
 * This copyright notice MUST stay intact for use.
 *
 * $Id: wysiwyg-settings.js,v 1.4 2007/01/22 23:05:57 xhaggi Exp $
 ********************************************************************/

/*
 * Full featured setup used the openImageLibrary addon
 */
var full = new WYSIWYG.Settings();
full.ImagesDir = "editor/images/";
full.PopupsDir = "editor/popups/";
full.CSSFile   = "editor/styles/wysiwyg.css";
full.Width = "85%"; 
full.Height = "250px";
// customize toolbar buttons
full.addToolbarElement("font", 3, 1); 
full.addToolbarElement("fontsize", 3, 2);
full.addToolbarElement("headings", 3, 3);
// openImageLibrary addon implementation
full.ImagePopupFile = "editor/addons/imagelibrary/insert_image.php";
full.ImagePopupWidth = 600;
full.ImagePopupHeight = 245;

/*
 * Small Setup Example
 */
var small = new WYSIWYG.Settings();
small.Width = "100%";
small.Height = "100%";
small.ImagesDir = "editor/images/";
small.CSSFile   = "editor/styles/wysiwyg.css";
small.DefaultStyle = "font-family: Arial; font-size: 12px; background-color: #FFFFFF";
small.Toolbar[0] = new Array("font", "fontsize", "bold", "italic", "underline", "seperator", "undo", "redo", "seperator", "viewSource"); // small setup for toolbar 1
small.Toolbar[1] = "";
small.StatusBarEnabled = false;
