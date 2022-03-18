const { __ } = wp.i18n;
const { PanelBody, RadioControl } = wp.components;
const { InspectorControls } = wp.blockEditor;

/**
 * Internal dependencies
 */
import TermSelector from './../../../components/term-selector';

const Sidebar = (props) => {
    const {
        attributes: { postType, count },
        setAttributes,
    } = props;

    return (
        <InspectorControls>
            <PanelBody title={__('Settings', 'meomblocks')} initialOpen={true}>
                <RadioControl
                    label={__('Select post type', 'meomblocks')}
                    selected={postType}
                    options={[
                        {
                            label: __('Post', 'meomblocks'),
                            value: 'post',
                        },
                        {
                            label: __('Reference', 'meomblocks'),
                            value: 'reference',
                        },
                        {
                            label: __('Professional', 'meomblocks'),
                            value: 'professional',
                        },
                    ]}
                    onChange={(newPostType) => {
                        setAttributes({ postType: newPostType });
                    }}
                />

                <RadioControl
                    label={__('Select count', 'meomblocks')}
                    selected={count}
                    options={[
                        {
                            label: __('3', 'meomblocks'),
                            value: '3',
                        },
                        {
                            label: __('6', 'meomblocks'),
                            value: '6',
                        },
                        {
                            label: __('9', 'meomblocks'),
                            value: '9',
                        },
                        {
                            label: __('All', 'meomblocks'),
                            value: '60',
                        },
                    ]}
                    onChange={(newCount) => {
                        setAttributes({ count: newCount });
                    }}
                />

                <TermSelector {...props} />
            </PanelBody>
        </InspectorControls>
    );
};

export default Sidebar;
