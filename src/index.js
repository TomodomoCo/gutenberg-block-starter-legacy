/**
 * WordPress Dependencies
 */
import { __ } from '@wordpress/i18n'
import { registerBlockType } from '@wordpress/blocks'

/**
 * Internal Dependencies
 */
import Editor from './block/editor'
import Renderer from './block/renderer'
import './style/style.scss'
import './style/editor.scss'

/**
 * Register myblock
 */
registerBlockType('tomodomo/starter', {
  title: __('My Starter Block'),
  description: __('A template for building a new Gutenberg block.'),
  keyword: [
    __('starter'),
  ],
  icon: 'plus',
  category: 'layout',
  attributes: {
  },
  edit: Editor,
  save: Renderer,
})
