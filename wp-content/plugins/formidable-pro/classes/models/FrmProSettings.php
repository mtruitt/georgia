<?php
class FrmProSettings extends FrmSettings {
    public $option_name = 'frmpro_options';

    // options
    public $edit_msg;
    public $update_value;
    public $already_submitted;
    public $cal_date_format;
    public $date_format;
	public $menu_icon;

    /**
     * @return array
     */
	public function default_options() {
        return array(
            'edit_msg'          => __( 'Your submission was successfully saved.', 'formidable-pro' ),
            'update_value'      => __( 'Update', 'formidable-pro' ),
            'already_submitted' => __( 'You have already submitted that form', 'formidable-pro' ),
			'date_format'       => 'm/d/Y',
			'cal_date_format'   => $this->get_cal_date(),
			'menu_icon'         => '',
			'currency'          => 'USD',
        );
    }

	public function set_default_options() {
		$this->fill_with_defaults();
	}

	public function update( $params ) {
		if ( isset( $params['frm_date_format'] ) ) {
			$this->date_format = $params['frm_date_format'];
		}
        $this->get_cal_date();

        $this->fill_with_defaults($params);
    }

	/**
	 * Get the conversions from php date format to datepicker
	 * Set the cal_date_format to make sure it's not empty
	 *
	 * @since 2.0.2
	 */
	public function get_cal_date() {
		$formats = FrmProAppHelper::display_to_datepicker_format();
		if ( isset( $formats[ $this->date_format ] ) ) {
			$this->cal_date_format = $formats[ $this->date_format ];
		} else {
			$this->cal_date_format = 'mm/dd/yy';
		}
	}

	public function store() {
        // Save the posted value in the database
		update_option( $this->option_name, $this, 'no' );

        delete_transient($this->option_name);
        set_transient($this->option_name, $this);
    }
}
