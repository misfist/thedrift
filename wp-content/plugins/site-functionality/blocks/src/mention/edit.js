import { RichText, InnerBlocks, useBlockProps } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';

import classNames from 'classnames';
import icon from './icon';

//  Import CSS.
import './editor.scss';
// import './style.scss';

const TEMPLATE = [
	[
		'core/paragraph',
		{
			placeholder: __( 'Add content...', 'site-functionality' ),
			className: 'mention__content',
		},
		[],
	],
];

const ALLOWED_BLOCKS = [
	'core/paragraph',
];

const ALLOWED_FORMATS = [ 'core/bold', 'core/italic', 'core/link' ];

const Edit = ( props ) => {
	const {
		attributes: { title, genre, author, content },
		className,
		setAttributes,
		isActive,
		context,
	} = props;

	const blockProps = useBlockProps( {
		className: classNames( className, 'mention' ),
	} );

	return (
		<article { ...blockProps }>
			<RichText
				tagName="h3"
				className="mention__title"
				value={ title }
				onChange={ ( value ) => {
					setAttributes( { title: value } );
				} }
				multiline={ false }
				allowedFormats={ ALLOWED_FORMATS }
				placeholder={ __(
					'Add Title...',
					'site-functionality'
				) }
			/>
			<RichText
				tagName="div"
				className="mention__genre"
				value={ genre }
				onChange={ ( value ) => {
					setAttributes( { genre: value } );
				} }
				placeholder={ __( 'Add Genre...', 'site-functionality' ) }
				multiline={ false }
				allowedFormats={ ALLOWED_FORMATS }
			/>
			<RichText
				tagName="div"
				className="mention__content"
				value={ content }
				onChange={ ( value ) => {
					setAttributes( { content: value } );
				} }
				placeholder={ __( 'Add Content...', 'site-functionality' ) }
				multiline="p"
				allowedFormats={ ALLOWED_FORMATS }
			/>
			<RichText
				tagName="div"
				className="mention__author"
				value={ author }
				onChange={ ( value ) => {
					setAttributes( { author: value } );
				} }
				placeholder={ __( 'Add Author Initials...', 'site-functionality' ) }
				multiline={ false }
				allowedFormats={ [] }
			/>
		</article>
	);
};

export default Edit;
