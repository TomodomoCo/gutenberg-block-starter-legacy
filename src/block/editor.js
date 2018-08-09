/**
 * WordPress Dependencies
 */
import { Fragment } from '@wordpress/element'

/**
 * Internal Dependencies
 */
import Inspector from '../block/inspector'

/**
 * Block edit component
 *
 * @param {object} props
 */
const Editor = (props) => {
  return (
    <Fragment>
      <Inspector {...{ ...props }} />
      <h1>Block Editor</h1>
    </Fragment>
  )
}

export default Editor
