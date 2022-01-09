const { __ } = wp.i18n;
const { PanelBody, RadioControl, ToggleControl } = wp.components;
const { InspectorControls } = wp.blockEditor;

const Sidebar = (props) => {
    const {
        attributes: { imagePosition, imageFull },
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

                <ToggleControl
                    label={__('Kokoleveä', 'meomblocks')}
                    checked={imageFull}
                    onChange={(newimageFull) => {
                        setAttributes({ imageFull: newimageFull });
                    }}
                />
            </PanelBody>
        </InspectorControls>
    );
};

export default Sidebar;
