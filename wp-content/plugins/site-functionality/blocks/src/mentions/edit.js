import { InnerBlocks, useBlockProps } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';

import classNames from 'classnames';

//  Import CSS.
// import './editor.scss';
// import './style.scss';

const TEMPLATE = [
	[
		'site-functionality/mention',
		{
			placeholder: __( 'Add FAQ...', 'site-functionality' ),
			className: 'mention',
		},
		[],
	],
];

const ALLOWED_BLOCKS = [ 'site-functionality/mention' ];

const Edit = ( props ) => {
	const {
		attributes: { recordId, anchor },
		className,
		setAttributes,
		clientId,
	} = props;

	setAttributes( {
		recordId: clientId,
	} );

	const blockProps = useBlockProps( {
		className: classNames( className, 'mentions__list' ),
	} );

	console.log( 'loaded' );

	return (
		<div { ...blockProps }>
			<InnerBlocks
				allowedBlocks={ ALLOWED_BLOCKS }
				template={ TEMPLATE }
			/>
		</div>
	);
};

export default Edit;
