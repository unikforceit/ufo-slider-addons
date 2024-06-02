<?php
namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class ufo_slider_addons extends Widget_Base
{

    public function get_name()
    {
        return 'ufo-slider-addons';
    }

    public function get_title()
    {
        return __('UFO Slider Addons', 'ufo');
    }

    public function get_categories()
    {
        return ['basic'];
    }

    public function get_icon()
    {
        return 'eicon-posts-group';
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'ufo'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new Repeater();

        $repeater->add_control(
            'Slider-heading',
            [
                'label' => esc_html__('Title', 'ufo'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Setup is a breeze', 'ufo'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'Slider-description',
            [
                'label' => esc_html__('Description', 'ufo'),
                'type' => Controls_Manager::WYSIWYG,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'show-toggle',
            [
                'label' => esc_html__('Show Toggle', 'ufo'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ufo'),
                'label_off' => esc_html__('Hide', 'ufo'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $repeater->add_control(
            'Slider-toggle-heading',
            [
                'label' => esc_html__('Toggle Heading', 'ufo'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'condition' => [
                    'show-toggle' => 'yes',
                ],
            ]
        );
        $repeater->add_control(
            'Slider-toggle-description',
            [
                'label' => esc_html__('Toggle Description', 'ufo'),
                'type' => Controls_Manager::WYSIWYG,
                'label_block' => true,
                'condition' => [
                    'show-toggle' => 'yes',
                ],
            ]
        );
        $repeater->add_control(
            'Slider-image',
            [
                'label' => esc_html__('Image', 'ufo'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'ttt_color',
            [
                'label' => __('Title Color', 'ufo'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.ufo-slider-item-wrapper .ufo-slider-content .heading' => 'color: {{VALUE}}',
                ],
            ]
        );
        $repeater->add_control(
            'ttti_color',
            [
                'label' => __('Info Color', 'ufo'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}.ufo-slider-item-wrapper .ufo-slider-content .ufo-slider-info' => 'color: {{VALUE}}',
                ],
            ]
        );
        $repeater->add_control(
            'tttiaat_color',
            [
                'label' => __('Toggle Info Color', 'ufo'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}.ufo-slider-item-wrapper .ufo-slider-image-wrapper .ufo-toggle-content' => 'color: {{VALUE}}',
                ],
            ]
        );
        $repeater->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'items-backgroundt',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} {{CURRENT_ITEM}.ufo-slider-item-wrapper',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__('Item Background', 'pixel-gallery'),
                    ],
                ],
            ]
        );
        $this->add_control(
            'sliders',
            [
                'label' => esc_html__('Slider', 'ufo'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'Slider-heading' => esc_html__('Setup is a breeze', 'ufo'),
                    ],
                    [
                        'Slider-heading' => esc_html__('Setup is a breeze', 'ufo'),
                    ],
                    [
                        'Slider-heading' => esc_html__('Setup is a breeze', 'ufo'),
                    ],
                    [
                        'Slider-heading' => esc_html__('Setup is a breeze', 'ufo'),
                    ],
                    [
                        'Slider-heading' => esc_html__('Setup is a breeze', 'ufo'),
                    ],
                    [
                        'Slider-heading' => esc_html__('Setup is a breeze', 'ufo'),
                    ],
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'content_sty',
            [
                'label' => __('Slider Controls', 'ufo'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        ); // start style section
        $this->add_responsive_control(
            'offset',
            [
                'label' => esc_html__('Offset', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 2,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .ufo-slider-section .swiper-slide' => 'transform: translateX({{SIZE}}{{UNIT}});',
                ],
            ]
        );
        $this->add_control(
            'slideView',
            [
                'label' => esc_html__('Slide Per View', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 20,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => '',
                    'size' => 5,
                ],
            ]
        );
        $this->add_control(
            'slideViewMobile',
            [
                'label' => esc_html__('Slide Per View (Mobile)', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 20,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => '',
                    'size' => 2,
                ],
            ]
        );
        $this->add_control(
            'slideGap',
            [
                'label' => esc_html__('Slide Gap', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => '',
                    'size' => 30,
                ],
            ]
        );
        $this->add_control(
            'centered',
            [
                'label' => esc_html__('Center Slide', 'ufo'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('True', 'ufo'),
                'label_off' => esc_html__('False', 'ufo'),
                'return_value' => 'true',
                'default' => 'true',
            ]
        );
        $this->add_control(
            'navEnable',
            [
                'label' => esc_html__('Nav Enable', 'ufo'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('True', 'ufo'),
                'label_off' => esc_html__('False', 'ufo'),
                'return_value' => 'true',
                'default' => 'true',
            ]
        );
        $this->add_control(
            'plus',
            [
                'label' => esc_html__('Plus', 'textdomain'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-plus-circle',
                    'library' => 'fa-solid',
                ],
            ]
        );
        $this->add_control(
            'Prev',
            [
                'label' => esc_html__('Prev', 'textdomain'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-arrow-left',
                    'library' => 'fa-solid',
                ],
            ]
        );
        $this->add_control(
            'Next',
            [
                'label' => esc_html__('Next', 'textdomain'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-arrow-right',
                    'library' => 'fa-solid',
                ],
            ]
        );
        $this->add_control(
            'nav_color',
            [
                'label' => __('Nav Color', 'ufo'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ufo-slider-section .swiper-button-next, {{WRAPPER}} .ufo-slider-section .swiper-button-prev' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .ufo-slider-section .swiper-button-next svg, {{WRAPPER}} .ufo-slider-section .swiper-button-prev svg' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'slidernav-background',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .ufo-slider-section .swiper-button-next, {{WRAPPER}} .ufo-slider-section .swiper-button-prev',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__('Slider Nav', 'pixel-gallery'),
                    ],
                ],
            ]
        );
        $this->add_control(
            'navh_color',
            [
                'label' => __('Nav Hover Color', 'ufo'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ufo-slider-section .swiper-button-next:hover, {{WRAPPER}} .ufo-slider-section .swiper-button-prev:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .ufo-slider-section .swiper-button-next:hover svg, {{WRAPPER}} .ufo-slider-section .swiper-button-prev:hover svg' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'slidernav-backgroun-hoverd',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .ufo-slider-section .swiper-button-next:hover, {{WRAPPER}} .ufo-slider-section .swiper-button-prev:hover',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__('Slider Nav Hover', 'pixel-gallery'),
                    ],
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'content_stys',
            [
                'label' => __('Slider Item Controls', 'ufo'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        ); // start style section
        $this->add_control(
            'title_tag',
            [
                'label' => esc_html__( 'Title Tag', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '1' => esc_html__( 'H1', 'textdomain' ),
                    '2' => esc_html__( 'H2', 'textdomain' ),
                    '3' => esc_html__( 'H3', 'textdomain' ),
                    '4' => esc_html__( 'H4', 'textdomain' ),
                    '5' => esc_html__( 'H5', 'textdomain' ),
                    '6' => esc_html__( 'H6', 'textdomain' ),
                ],
            ]
        );
        $this->start_controls_tabs(
            'style_tabs'
        );

        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => esc_html__('Normal', 'textdomain'),
            ]
        );
        $this->add_control(
            'tttaa_color',
            [
                'label' => __('Title Color', 'ufo'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ufo-slider-item-wrapper .ufo-slider-content .heading' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'tttia_color',
            [
                'label' => __('Info Color', 'ufo'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ufo-slider-item-wrapper .ufo-slider-content .ufo-slider-info' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ttttypography',
                'label' => __('Title Typography', 'ufo'),
                'selector' => '{{WRAPPER}} .ufo-slider-item-wrapper .ufo-slider-content .heading',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'infottypography',
                'label' => __('Info Typography', 'ufo'),
                'selector' => '{{WRAPPER}} .ufo-slider-item-wrapper .ufo-slider-content .ufo-slider-info',
            ]
        );
        $this->add_control(
            'tttiaa_color',
            [
                'label' => __('Toggle Info Color', 'ufo'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ufo-slider-item-wrapper .ufo-slider-image-wrapper .ufo-toggle-content' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'infotttypography',
                'label' => __('Toggle Info Typography', 'ufo'),
                'selector' => '{{WRAPPER}} .ufo-slider-item-wrapper .ufo-slider-image-wrapper .ufo-toggle-content',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'before_bg',
                'types' => [ 'gradient'],
                'selector' => '{{WRAPPER}} .ufo-slider-item-wrapper .ufo-slider-image-wrapper:before',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__('Top Shade', 'pixel-gallery'),
                    ],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'after_bg',
                'types' => [ 'gradient'],
                'selector' => '{{WRAPPER}} .ufo-slider-item-wrapper .ufo-slider-image-wrapper:after',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__('Bottom Shade', 'pixel-gallery'),
                    ],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'item-Image-shadow',
                'selector' => '{{WRAPPER}} .ufo-slider-item-wrapper .ufo-slider-image-wrapper',
                'label' => esc_html__('Image Shadow', 'pixel-gallery'),
            ]
        );
        $this->add_responsive_control(
            'item-image-padding',
            [
                'label' => esc_html__('Image Padding', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .ufo-slider-item-wrapper .ufo-slider-image-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'item-Image-Border',
                'label' => __('Image Border', 'textdomain'),
                'selector' => '{{WRAPPER}} .ufo-slider-item-wrapper .ufo-slider-image-wrapper',
            ]
        );
        $this->add_responsive_control(
            'border-Image-radius',
            [
                'label' => esc_html__('Image Border Radius', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .ufo-slider-item-wrapper .ufo-slider-image-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'item-Image-margin',
            [
                'label' => esc_html__('Image Margin', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .ufo-slider-item-wrapper .ufo-slider-image-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'item-image-background',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .ufo-slider-item-wrapper .ufo-slider-image-wrapper',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__('Image Background', 'pixel-gallery'),
                    ],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'item-content-shadow',
                'selector' => '{{WRAPPER}} .ufo-slider-item-wrapper .ufo-slider-content',
                'label' => esc_html__('Content Shadow', 'pixel-gallery'),
            ]
        );
        $this->add_responsive_control(
            'item-content-padding',
            [
                'label' => esc_html__('Content Padding', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .ufo-slider-item-wrapper .ufo-slider-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'item-content-Border',
                'label' => __('Content Border', 'textdomain'),
                'selector' => '{{WRAPPER}} .ufo-slider-item-wrapper .ufo-slider-content',
            ]
        );
        $this->add_responsive_control(
            'border-content-radius',
            [
                'label' => esc_html__('Content Border Radius', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .ufo-slider-item-wrapper .ufo-slider-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'item-content-margin',
            [
                'label' => esc_html__('Content Margin', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .ufo-slider-item-wrapper .ufo-slider-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'item-content-background',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .ufo-slider-item-wrapper .ufo-slider-content',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__('Content Background', 'pixel-gallery'),
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'item-content-paddingt',
            [
                'label' => esc_html__('Toggle Padding', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .ufo-slider-item-wrapper .ufo-toggle-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'item-content-Bordert',
                'label' => __('Toggle Border', 'textdomain'),
                'selector' => '{{WRAPPER}} .ufo-slider-item-wrapper .ufo-toggle-content',
            ]
        );
        $this->add_responsive_control(
            'border-content-radiust',
            [
                'label' => esc_html__('Toggle Border Radius', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .ufo-slider-item-wrapper .ufo-toggle-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'item-content-margint',
            [
                'label' => esc_html__('Toggle Margin', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .ufo-slider-item-wrapper .ufo-toggle-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'item-content-backgroundt',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .ufo-slider-item-wrapper .ufo-toggle-content',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__('Toggle Background', 'pixel-gallery'),
                    ],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'item-backgroundt',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .ufo-slider-item-wrapper',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__('Item Background', 'pixel-gallery'),
                    ],
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__('Hover', 'textdomain'),
            ]
        );
        $this->add_control(
            'hover_settings',
            [
                'label' => esc_html__( 'Hover Settings', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'ttt_colorh',
            [
                'label' => __('Title Color', 'ufo'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ufo-slider-item-wrapper:hover .ufo-slider-content .heading' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ttttypographyh',
                'label' => __('Title Typography', 'ufo'),
                'selector' => '{{WRAPPER}} .ufo-slider-item-wrapper:hover .ufo-slider-content .heading',
            ]
        );
        $this->add_control(
            'ttti_colorh',
            [
                'label' => __('Info Color', 'ufo'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ufo-slider-item-wrapper:hover .ufo-slider-content .ufo-slider-info' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'infottypographyh',
                'label' => __('Info Typography', 'ufo'),
                'selector' => '{{WRAPPER}} .ufo-slider-item-wrapper:hover .ufo-slider-content .ufo-slider-info',
            ]
        );
        $this->add_control(
            'tttia_colorh',
            [
                'label' => __('Toggle Info Color', 'ufo'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ufo-slider-item-wrapper:hover .ufo-slider-image-wrapper .ufo-toggle-content' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'infotttypographyh',
                'label' => __('Toggle Info Typography', 'ufo'),
                'selector' => '{{WRAPPER}} .ufo-slider-item-wrapper:hover .ufo-slider-image-wrapper .ufo-toggle-content',
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'item-Image-shadowh',
                'selector' => '{{WRAPPER}} .ufo-slider-item-wrapper:hover .ufo-slider-image-wrapper',
                'label' => esc_html__('Image Shadow', 'pixel-gallery'),
            ]
        );
        $this->add_responsive_control(
            'item-image-paddingh',
            [
                'label' => esc_html__('Image Padding', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .ufo-slider-item-wrapper:hover .ufo-slider-image-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'item-Image-Borderh',
                'label' => __('Image Border', 'textdomain'),
                'selector' => '{{WRAPPER}} .ufo-slider-item-wrapper:hover .ufo-slider-image-wrapper',
            ]
        );
        $this->add_responsive_control(
            'border-Image-radiush',
            [
                'label' => esc_html__('Image Border Radius', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .ufo-slider-item-wrapper:hover .ufo-slider-image-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'item-Image-marginh',
            [
                'label' => esc_html__('Image Margin', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .ufo-slider-item-wrapper:hover .ufo-slider-image-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'item-image-backgrounhd',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .ufo-slider-item-wrapper:hover .ufo-slider-image-wrapper',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__('Image Background', 'pixel-gallery'),
                    ],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'item-content-shadowh',
                'selector' => '{{WRAPPER}} .ufo-slider-item-wrapper:hover .ufo-slider-content',
                'label' => esc_html__('Content Shadow', 'pixel-gallery'),
            ]
        );
        $this->add_responsive_control(
            'item-content-paddingh',
            [
                'label' => esc_html__('Content Padding', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .ufo-slider-item-wrapper:hover .ufo-slider-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'item-content-Borderh',
                'label' => __('Content Border', 'textdomain'),
                'selector' => '{{WRAPPER}} .ufo-slider-item-wrapper:hover .ufo-slider-content',
            ]
        );
        $this->add_responsive_control(
            'border-content-radiush',
            [
                'label' => esc_html__('Content Border Radius', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .ufo-slider-item-wrapper:hover .ufo-slider-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'item-content-marginh',
            [
                'label' => esc_html__('Content Margin', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .ufo-slider-item-wrapper:hover .ufo-slider-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'item-content-backgroundh',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .ufo-slider-item-wrapper:hover .ufo-slider-content',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__('Content Background', 'pixel-gallery'),
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'item-content-paddingth',
            [
                'label' => esc_html__('Toggle Padding', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .ufo-slider-item-wrapper:hover .ufo-toggle-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'item-content-Borderth',
                'label' => __('Toggle Border', 'textdomain'),
                'selector' => '{{WRAPPER}} .ufo-slider-item-wrapper:hover .ufo-toggle-content',
            ]
        );
        $this->add_responsive_control(
            'border-content-radiusth',
            [
                'label' => esc_html__('Toggle Border Radius', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .ufo-slider-item-wrapper:hover .ufo-toggle-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'item-content-marginth',
            [
                'label' => esc_html__('Toggle Margin', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .ufo-slider-item-wrapper:hover .ufo-toggle-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'item-content-backgroundth',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .ufo-slider-item-wrapper:hover .ufo-toggle-content',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__('Toggle Background', 'pixel-gallery'),
                    ],
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $slider = $settings['sliders'];

        include dirname(__FILE__) . '/layout.php';
    }

}

Plugin::instance()->widgets_manager->register(new ufo_slider_addons());