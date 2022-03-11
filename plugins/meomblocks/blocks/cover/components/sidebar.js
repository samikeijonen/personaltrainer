const { __ } = wp.i18n;
const { PanelBody, RadioControl } = wp.components;
const { InspectorControls } = wp.blockEditor;

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
                            label: __('Keskellä', 'meomblocks'),
                            value: 'center',
                        },
                        {
                            label: __('Ylhäältä', 'meomblocks'),
                            value: 'top',
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

export default Sidebar;
