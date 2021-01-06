<?php

use Elementor\Controls_Manager;
use Elementor\Core\Schemes\Color;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;

require_once __DIR__ . '/../classes/Agency_Vita.php';

/**
 * Elementor Vita Widget.
 *
 * Elementor widget that displays an actors vita from external app Film DB.
 *
 * @since 1.0.0
 */
class Elementor_Vita_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve widget name.
	 *
	 * @return string Widget name.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_name() {
		return 'vita';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve widget title.
	 *
	 * @return string Widget title.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_title() {
		return 'Vita';
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve widget icon.
	 *
	 * @return string Widget icon.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_icon() {
		return 'fa fa-address-card';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * @return array Widget categories.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Register widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Integration', 'agency' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'heading',
			[
				'label'       => 'Heading',
				'type'        => Controls_Manager::TEXT,
				'input_type'  => 'text',
				'placeholder' => '',
			]
		);

		$this->add_control(
			'slug',
			[
				'label'       => 'Slug',
				'type'        => Controls_Manager::TEXT,
				'input_type'  => 'text',
				'placeholder' => 'vorname-nachname',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'styles_section',
			[
				'label' => __( 'Schrift', 'agency' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'content_typography_heading',
				'label'    => __( 'Typography Heading', 'agency' ),
				'scheme'   => Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .vita-heading',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'content_typography_class',
				'label'    => __( 'Typography Klasse', 'agency' ),
				'scheme'   => Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .vita-class',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'content_typography_year',
				'label'    => __( 'Typography Jahr', 'agency' ),
				'scheme'   => Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .vita-year',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'content_typography_role',
				'label'    => __( 'Typography Rolle', 'agency' ),
				'scheme'   => Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .vita-role',
			]
		);

		$this->add_control(
			'vita_color',
			[
				'label'     => __( 'Text Farbe', 'agency' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .vita' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		$heading = $settings['heading'];
		$slug    = $settings['slug'];


		if ( $slug ) {
			$vita = new Agency_Vita();
			echo $vita->get_vita($slug, $heading);
		} else {
			echo 'Slug fehlt noch!';
		}
	}
}
