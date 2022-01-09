<?php
class Elementor_Widget_Image_Hover extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'elementor_image_hover';
    }

    public function get_title()
    {
        return __('Image Hover', 'elementor_image_hover');
    }

    public function get_icon()
    {
        return 'eicon-image';
    }

    public function get_categories()
    {
        return [ 'general' ];
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
              'label' => __('Content', 'elementor_image_hover'),
              'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__('Choose Image', 'elementor_image_hover'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'title',
            [
              'label' => __('Titel', 'elementor_image_hover'),
              'type' => \Elementor\Controls_Manager::TEXT,
              'default' => __('Überschrift', 'elementor_image_hover'),
              'placeholder' => __('Text eingeben', 'elementor_image_hover'),
            ]
        );

        $this->add_control(
            'subtitle',
            [
              'label' => __('Untertitel', 'elementor_image_hover'),
              'type' => \Elementor\Controls_Manager::TEXT,
              'default' => __('', 'elementor_image_hover'),
              'placeholder' => __('Text eingeben', 'elementor_image_hover'),
            ]
        );

        $this->add_control(
            'button_link',
            [
              'label' => __('Button Link', 'elementor_image_hover'),
              'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'plugin-domain'),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );



        $this->end_controls_section();

        $this->start_controls_section(
            'style_section',
            [
                'label' => __('Style', 'elementor_image_hover'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography_title',
                'label' => __('Überschrift Style', 'elementor_image_hover'),
                'selector' => '{{WRAPPER}} .image__hover__title',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography_text',
                'label' => __('Text Style', 'elementor_image_hover'),
                'selector' => '{{WRAPPER}} .image__hover__text',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $isEditor = \Elementor\Plugin::$instance->editor->is_edit_mode();
        $settings = $this->get_settings_for_display();
        $title = $settings["title"];
        $subtitle = $settings["subtitle"];
        $button_text = $settings["button_text"];
        $button_link = $settings["button_link"];
        $editorClass = ($isEditor)?" isEditor " : "";
        ?>


        <div class="image__hover">
          <div class="image__hover__content <?=$editorClass;?>">
            <p class="image__hover__title" ><?=$title; ?></p>
            <p class="image__hover__text"><?=$subtitle; ?></p>
          </div>
          <img src="<?=$settings['image']['url']; ?>">
          <a href="<?=$button_link["url"]; ?>"></a>
        </div>

<?php
    }

    protected function _content_template()
    {
    }
}
