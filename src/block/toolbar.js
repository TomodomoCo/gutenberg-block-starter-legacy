/**
 * External Dependencies
 */

/**
 * WordPress Dependencies
 */
import { __ } from "@wordpress/i18n";
import { BlockControls } from "@wordpress/blocks";

/**
 * Internal Dependencies
 */

/**
 *
 * @param {object} props component props
 * @returns {object} Component
 */
const Toolbar = props => {
  const {
    attributes,
    setAttributes
  } = props;

  // Block Controls
  return (
    <BlockControls>
      Add controls
    </BlockControls>
  );
};

export default Toolbar;
