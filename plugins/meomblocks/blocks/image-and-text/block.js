import classNames from 'classnames';

const { registerBlockType } = wp.blocks;
const { InnerBlocks, useBlockProps, useInnerBlocksProps } = wp.blockEditor;

/**
 * Internal dependencies
 */
import block from './block.json';
import ImageSelect from '../../components/image-select';
import Sidebar from './components/sidebar';

const ALLOWED_BLOCKS = [
    'core/paragraph',
    'core/heading',
    'core/button',
    'core/quote',
    'core/list',
];

const TEMPLATE = [
    ['core/heading', {}],
    ['core/paragraph', {}],
];

export default registerBlockType(block.name, {
    edit: (props) => {
        const {
            attributes: { imagePosition, imageFull, image },
            setAttributes,
        } = props;

        const imageFullClass = imageFull ? 'has-full-img' : 'has-not-full-img';
        const alignClass = imageFull ? 'alignfull' : 'alignwide';

        const classes = classNames({
            'image-and-text': true,
            [`image-and-text--position-${imagePosition}`]: true,
            [`${imageFullClass}`]: true,
            [`${alignClass}`]: true,
            'content-row': true,
        });

        const blockProps = useBlockProps({ // eslint-disable-line
            className: classes,
        });

        const innerBlocksProps = useInnerBlocksProps( // eslint-disable-line
            {
                className: 'image-and-text__content top-margin x-padding',
            },
            {
                allowedBlocks: ALLOWED_BLOCKS,
                template: TEMPLATE,
            }
        );

        return (
            <div {...blockProps}>
                <Sidebar {...props} />
                <div
                    className={`image-and-text__container grid has-2-columns has-no-gap`}
                >
                    <figure className={`image-and-text__image`}>
                        <ImageSelect
                            image={image}
                            onChange={(newImage) =>
                                setAttributes({ image: newImage })
                            }
                        />
                    </figure>
                    <div {...innerBlocksProps}></div>
                </div>
            </div>
        );
    },

    save: () => <InnerBlocks.Content />,
});
