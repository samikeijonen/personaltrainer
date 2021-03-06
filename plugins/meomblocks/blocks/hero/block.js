import classNames from 'classnames';

const { registerBlockType } = wp.blocks;
const { InnerBlocks, useBlockProps, useInnerBlocksProps } = wp.blockEditor;

/**
 * Internal dependencies
 */
import block from './block.json';
import ImageSelect from '../../components/image-select';
import Sidebar from './components/sidebar';

const ALLOWED_BLOCKS = ['core/paragraph', 'core/heading', 'core/buttons'];

const TEMPLATE = [
    ['core/heading', { level: 1 }],
    ['core/paragraph', {}],
];

export default registerBlockType(block.name, {
    edit: (props) => {
        const {
            attributes: { image, imagePosition, videoUrl },
            setAttributes,
        } = props;

        const classes = classNames({
            hero: true,
            'cover-bg': true,
            alignfull: true,
            [`has-img-position-${imagePosition}`]: true,
            'content-row': true,
            'editor-outlines': true,
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
                <Sidebar {...props} />
                <div className={`hero__container container x-padding`}>
                    <div {...innerBlocksProps}></div>

                    {videoUrl ? (
                        <div className="hero__video">
                            <video
                                className="cover-img"
                                muted
                                playsinline
                                autoPlay
                                loop
                                width="1280"
                                height="720"
                                src={videoUrl}
                            ></video>
                        </div>
                    ) : (
                        <figure className={`hero__image`}>
                            <ImageSelect
                                image={image}
                                classes="cover-img"
                                onChange={(newImage) =>
                                    setAttributes({ image: newImage })
                                }
                            />
                        </figure>
                    )}
                </div>
            </div>
        );
    },

    save: () => <InnerBlocks.Content />,
});
