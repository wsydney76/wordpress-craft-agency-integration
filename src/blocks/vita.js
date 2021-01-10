import {registerBlockType} from '@wordpress/blocks';
import {PanelBody, TextControl} from '@wordpress/components';
import {InspectorControls} from '@wordpress/block-editor';
import ServerSideRender from '@wordpress/server-side-render';
import {useBlockProps} from '@wordpress/block-editor';

const blockStyle = {
    backgroundColor: '#e4e4e4',
    color: '#000',
    padding: '20px',
    marginBottom: '12px'
};

registerBlockType('agency/vita-block', {

    title: 'Vita Gutenberg Block',
    icon: 'universal-access-alt',
    category: 'widgets',


    edit: (props) => {

        const {attributes, setAttributes} = props;
        const blockProps = useBlockProps();

        return (
            <div {...blockProps}>
                <InspectorControls>
                    <PanelBody title="Vita">
                        <label>Profil-Slug in der Agentur-DB:</label>
                        <TextControl
                            value={attributes.slug}
                            onChange={(newtext) => setAttributes({slug: newtext})}
                        />
                        <label>Heading:</label>
                        <TextControl
                            value={attributes.heading}
                            onChange={(newtext) => setAttributes({heading: newtext})}
                        />
                    </PanelBody>
                </InspectorControls>

                {!attributes.slug && (
                <div style={blockStyle}>
                    <div>Slug eingeben.</div>
                </div>
                )}

                <ServerSideRender
                    block="agency/vita-block"
                    attributes={attributes}
                />
            </div>
        );
    },

    save: (props) => {
        return null;
    },

});
