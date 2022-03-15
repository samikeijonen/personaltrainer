const { __ } = wp.i18n;
const { PanelBody, RadioControl, TextControl } = wp.components;
const { InspectorControls } = wp.blockEditor;

const Sidebar = (props) => {
    const {
        attributes: { imagePosition, videoUrl },
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

                <TextControl
                    label={__('Videon URL', 'meom-blocks')}
                    help={__('Video syrjäyttää Heron kuvan.', 'meom-blocks')}
                    value={videoUrl}
                    onChange={(newVideoUrl) => {
                        setAttributes({ videoUrl: newVideoUrl });
                    }}
                />
            </PanelBody>
        </InspectorControls>
    );
};

export default Sidebar;
