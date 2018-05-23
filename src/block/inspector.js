/**
 * External Dependencies
 */

/**
 * WordPress Dependencies
 */
import { __ } from "@wordpress/i18n";
import { InspectorControls } from "@wordpress/editor";
import { PanelBody } from "@wordpress/components";

/**
 * Internal Dependencies
 */

/**
 *
 * @param {object} props component props
 * @returns {object} Component
 */
const Inspector = props => {
  const { attributes, setAttributes } = props;

  // Inspector Controls
  return <InspectorControls>Add controls</InspectorControls>;
};

export default Inspector;
