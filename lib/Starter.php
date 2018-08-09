<?php

namespace Tomodomo\Gutenberg\Block;

class Starter
{

	/**
	 * Start the plugin
	 *
	 * @return void
	 */
	public function init()
	{
		$this->registerHooks();

		return;
	}

	/**
	 * Hook into actions and filters.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	private function registerHooks()
	{
		add_action('init', [$this, 'register']);

		return;
	}

	/**
	 * Register the block and all style/scripts it needs
	 *
	 * @return void
	 */
	public function register()
	{
		if (!function_exists('register_block_type')) {
			return;
		}

		// Block editor JS
		wp_register_script(
			'tomodomo-block-starter-js-editor',
			TOMODOMO_BLOCK_STARTER_PLUGIN_URL . 'build/script.js',
			[
				'wp-i18n',
				'wp-blocks',
				'wp-element',
			],
			filemtime(TOMODOMO_BLOCK_STARTER_PLUGIN_DIR . 'build/script.js')
		);

		// Global style
		wp_register_style(
			'tomodomo-block-starter-css-main',
			TOMODOMO_BLOCK_STARTER_PLUGIN_URL . 'build/style.css',
			[],
			filemtime(TOMODOMO_BLOCK_STARTER_PLUGIN_DIR . 'build/style.css')
		);

		// Editor style
		wp_register_style(
			'tomodomo-block-starter-css-editor',
			TOMODOMO_BLOCK_STARTER_PLUGIN_URL . 'build/editor.css',
			[],
			filemtime(TOMODOMO_BLOCK_STARTER_PLUGIN_DIR . 'build/editor.css')
		);

		// Register the block
		register_block_type('tomodomo/starter', [
			'attributes'      => [],
			'style'           => 'tomodomo-block-starter-css-main',
			'editor_style'    => 'tomodomo-block-starter-css-editor',
			'editor_script'   => 'tomodomo-block-starter-js-editor',
			'render_callback' => [$this, 'render'],
		]);

		return;
	}

	/**
	 * Gutenberg allows you to render your block on the front-end
	 * with PHP; this is where you put that code
	 *
	 * @param array $attributes
	 * @return string
	 */
	public function render($attributes = [])
	{
		$content = '';

		// Return the block
		return $content;
	}

}
