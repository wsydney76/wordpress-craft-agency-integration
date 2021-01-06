import {__} from '@wordpress/i18n';
import {registerBlockType} from '@wordpress/blocks';
import {PanelBody, TextControl} from '@wordpress/components';
import {InspectorControls} from '@wordpress/block-editor';

const blockStyle = {
    backgroundColor: '#e4e4e4',
    color: '#000',
    padding: '20px',
};

registerBlockType('agency/vita-block', {

    title: 'Vita Gutenberg Block',
    icon: 'universal-access-alt',
    category: 'widgets',

    attributes: {
        slug: {
            type: 'string',
            default: ''
        },
        heading: {
            type: 'string',
            default: ''
        },
    },

    edit: (props) => {

        const {attributes, setAttributes} = props;

        return (
            <div>
                <InspectorControls>
                    <PanelBody title={__('Vita')}>
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

                <div style={blockStyle}>
                    <div>Importierte Vita wird hier angezeigt. Slug: {attributes.slug}</div>
                </div>
            </div>
        );
    },

    save: (props) => {
        return null;
    },

});
