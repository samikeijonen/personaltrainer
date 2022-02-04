import classNames from 'classnames';

const { registerBlockType } = wp.blocks;
const { useBlockProps } = wp.blockEditor;

const { serverSideRender: ServerSideRender } = wp;

import metadata from './block.json';
import Sidebar from './components/sidebar';

const { name } = metadata;

const BLOCK_SLUG = 'latest-posts';

export default registerBlockType(name, {
    edit: (props) => {
        const { attributes } = props;

        const classes = classNames({
            [`${BLOCK_SLUG}`]: true,
            // For editor.
            alignwide: true,
        });

        const blockProps = useBlockProps({ // eslint-disable-line
            className: classes,
        });

        return (
            <div {...blockProps}>
                <ServerSideRender block={name} attributes={attributes} />

                <Sidebar {...props} />
            </div>
        );
    },

    save: () => {
        return null;
    },
});
