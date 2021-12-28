import classNames from 'classnames';

const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { PanelBody, RadioControl } = wp.components;
const { InspectorControls, InnerBlocks, useBlockProps, useInnerBlocksProps } =
    wp.blockEditor;

/**
 * Internal dependencies
 */
import block from './block.json';
import ImageSelect from '../../components/image-select';

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
            attributes: { imagePosition, image },
            className,
            setAttributes,
        } = props;

        const classes = classNames({
            'image-and-text': true,
            [`image-and-text--position-${imagePosition}`]: true,
            alignfull: true,
            'content-row': true,
            [`${className}`]: className ? true : false,
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

const Sidebar = (props) => {
    const {
        attributes: { imagePosition },
        setAttributes,
    } = props;
    return (
        <InspectorControls>
            <PanelBody
                title={__('Perusasetukset', 'meomblocks')}
                initalOpen={true}
            >
                <RadioControl
                    label={__('Kuvan sijainti', 'meomblocks')}
                    selected={imagePosition}
                    options={[
                        {
                            label: __('Vasemmalla', 'meomblocks'),
                            value: 'left',
                        },
                        {
                            label: __('Oikealla', 'meomblocks'),
                            value: 'right',
                        },
                    ]}
                    onChange={(newImagePosition) => {
                        setAttributes({ imagePosition: newImagePosition });
                    }}
                />
            </PanelBody>
        </InspectorControls>
    );
};
