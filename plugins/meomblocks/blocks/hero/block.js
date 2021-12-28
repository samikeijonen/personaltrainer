import classNames from 'classnames';

const { registerBlockType } = wp.blocks;
const { InnerBlocks, useBlockProps, useInnerBlocksProps } = wp.blockEditor;

/**
 * Internal dependencies
 */
import block from './block.json';
import ImageSelect from '../../components/image-select';

const ALLOWED_BLOCKS = ['core/paragraph', 'core/heading', 'core/buttons'];

const TEMPLATE = [
    ['core/heading', { level: 1 }],
    ['core/paragraph', {}],
];

export default registerBlockType(block.name, {
    edit: (props) => {
        const {
            attributes: { image },
            className,
            setAttributes,
        } = props;

        const classes = classNames({
            hero: true,
            'cover-bg': true,
            alignfull: true,
            'content-row': true,
            'editor-outlines': true,
            [`${className}`]: className ? true : false,
        });

        const blockProps = useBlockProps({ // eslint-disable-line
            className: classes,
        });

        const innerBlocksProps = useInnerBlocksProps( // eslint-disable-line
            {
                className: 'hero__content top-margin',
            },
            {
                allowedBlocks: ALLOWED_BLOCKS,
                template: TEMPLATE,
            }
        );

        return (
            <div {...blockProps}>
                <div className={`hero__container container`}>
                    <div {...innerBlocksProps}></div>
                    <figure className={`hero__image`}>
                        <ImageSelect
                            image={image}
                            classes="cover-img"
                            onChange={(newImage) =>
                                setAttributes({ image: newImage })
                            }
                        />
                    </figure>
                </div>
            </div>
        );
    },

    save: () => <InnerBlocks.Content />,
});
