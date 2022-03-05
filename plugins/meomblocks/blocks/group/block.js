import classNames from 'classnames';

const { registerBlockType } = wp.blocks;
const { InnerBlocks, useBlockProps, useInnerBlocksProps } = wp.blockEditor;

/**
 * Internal dependencies
 */
import block from './block.json';

const BLOCK_SLUG = 'group';

export default registerBlockType(block.name, {
    edit: (props) => {
        const {
            attributes: {},
        } = props;

        const classes = classNames({
            [`${BLOCK_SLUG}`]: true,
        });

        const blockProps = useBlockProps({ // eslint-disable-line
            className: classes,
        });

        const innerBlocksProps = useInnerBlocksProps(blockProps, { // eslint-disable-line
            renderAppender: InnerBlocks.ButtonBlockAppender,
        });

        return <div {...innerBlocksProps} />;
    },

    save: () => {
        return <InnerBlocks.Content />;
    },
});
