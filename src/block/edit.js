/**
 * WordPress Dependencies
 */
import { Fragment } from "@wordpress/element";

/**
 * Internal Dependencies
 */
import Inspector from "../block/inspector";
import Toolbar from "../block/toolbar";

/**
 * Block edit component
 * @param {object} props
 */
const editor = props => {
  return (
    <Fragment>
      <Inspector {...{ ...props }} />
      <Toolbar {...{ ...props }} />
      <h1> Block Edit </h1>
    </Fragment>
  );
};

export default editor;
