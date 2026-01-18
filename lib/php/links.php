<?php

class Link {
    private string $label;
    private string $url;
    private string $icon;

    public function __construct(string $url, string $label, string $icon = NULL) {
        $this->url = $url;
        $this->label = $label;
        $this->icon = $icon;
    }

    public function get_icon(): string {
        return $this->icon;
    }
    
    public function get_url(): string {
        return $this->url;
    }
    
    public function get_label(): string {
        return $this->label;
    }
}