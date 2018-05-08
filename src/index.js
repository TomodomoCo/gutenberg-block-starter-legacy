/**
 * External Dependencies
 */

/**
 * WordPress Dependencies
 */
import { __ } from "@wordpress/i18n";
import { registerBlockType } from "@wordpress/blocks";

/**
 * Internal Dependencies
 */
import blockAttributes from "./data/attributes";
import editor from "./block/edit";
import render from "./block/render";
import "./style/style.scss";
import "./style/editor.scss";

/**
 * Register myblock
 */
registerBlockType("tomodomoco/myblock", {
  title: __("My Block"),
  description: __("My Awesome Block"),
  keyword: [__("one"), __("two"), __("three")],
  icon: "plus",
  category: "layout",
  attributes: blockAttributes,
  edit: editor,
  save: render
});
