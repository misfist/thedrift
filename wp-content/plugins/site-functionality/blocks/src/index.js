import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';


//  Import CSS.
import './editor.scss';
import './style.scss';

// import './patterns';
// import './styles';

import * as mention from './mention';
import * as mentions from './mentions';

const blocks = [
	mentions,
	mention,
];

/**
 * Function to register an individual block.
 *
 * @param {Object} block The block to be registered.
 *
 */
const registerBlock = ( block ) => {
	if ( ! block ) {
		return;
	}

	const { name, settings } = block;

	registerBlockType( name, {
		...settings,
	} );
};

/**
 * Function to register blocks
 */
export const registerBlocks = () => {
	blocks.forEach( registerBlock );
};

registerBlocks();
