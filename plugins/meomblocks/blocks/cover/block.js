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
    ['core/heading', { level: 2 }],
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
            cover: true,
            'cover-bg': true,
            alignfull: true,
            'content-row': true,
            'x-padding': true,
            'has-background': true,
            'editor-outlines': true,
            [`${className}`]: className ? true : false,
        });

        const blockProps = useBlockProps({ // eslint-disable-line
            className: classes,
        });

        const innerBlocksProps = useInnerBlocksProps( // eslint-disable-line
            {
                className: 'cover__content top-margin',
            },
            {
                allowedBlocks: ALLOWED_BLOCKS,
                template: TEMPLATE,
            }
        );

        return (
            <div {...blockProps}>
                <div className={`cover__container container alignregular`}>
                    <div {...innerBlocksProps}></div>
                    <figure className={`cover__image`}>
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
