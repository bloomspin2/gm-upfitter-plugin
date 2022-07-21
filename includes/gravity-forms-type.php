<?php
function gravityFormCustomFieldType(){
    if (class_exists('GF_Field')) {
    	class CustomFieldsGravityAutoType extends GF_Field {
    		public $type = 'automotive_matrix_type';


    		public function get_form_editor_field_title() {
    			return esc_attr__('Auto Type', 'txtdomain');
    		}

    		public function get_form_editor_button() {
    			return [
    				'group' => 'advanced_fields',
    				'text'  => $this->get_form_editor_field_title(),
    			];
    		}

    		public function get_form_editor_field_settings() {
    			return [
    				'label_setting',
    				'choices_setting',
    				'description_setting',
    				'rules_setting',
    				'error_message_setting',
    				'css_class_setting',
    				'conditional_logic_field_setting',
    			];
    		}

    		public function is_value_submission_array() {
    			return true;
    		}


            //// MAIN Field Output
    		public function get_field_input($form, $value = '', $entry = null) {
    			if ($this->is_form_editor()) {
    				return '';
    			}

                $form_id = $form['id'];
                $id = (int) $this->id;

                $years = $this->get_matrix_years();

                $html='';

                //Type
                $html.='<div class="ginput_container ginput_container_select">';
                    $html.='<select dataSelected="'.sanitize_text_field($value).'"  class="auto_matrix_type large gfield_select" value="" id="input_'.$id.'" type="select" name="input_'.$id.'">';
                    if($value){
                        $html.='<option value="" disabled selected>Select a Type</option>';
                    }else{
                        $html.='<option value="">Select a Type</option>';
                    }
                    $html.='</select>';
                $html.= '</div>';

                $jsonCSV = $this->get_matrix_csvs();
                if(is_array($jsonCSV)){
                    $html.='<script>';

                    foreach($jsonCSV as $key=>$csv){
                        $html.='var json_'.$key.'='.$csv."\n";
                    }

                    $html.='</script>';

                }


    			return $html;
    		}

    		public function get_value_entry_list($value, $entry, $field_id, $columns, $form) {
    			return __('Enter details to see delivery details', 'txtdomain');
    		}

            public function get_value_entry_detail($value, $currency = '', $use_text = false, $format = 'html', $media = 'screen') {
                return $value;
            }

    		public function get_value_merge_tag($value, $input_id, $entry, $form, $modifier, $raw_value, $url_encode, $esc_html, $format, $nl2br) {
                $value = maybe_unserialize($value);
                if (empty($value)) {
                    return $value;
                }
    		}


            function get_matrix_years(){

                $years=[];
                if( get_field('csv_files', 'option') ) {

                    while( the_repeater_field('csv_files', 'option') ) {
                        if(get_sub_field('csv_file')){
                            $years[get_sub_field('csv_year')]=get_sub_field('csv_year');
                        }
                    }
                }

                return $years;
            }

            public function get_matrix_csvs(){

                if( get_field('csv_files', 'option') ) {

                    while( the_repeater_field('csv_files', 'option') ) {

                        $csvYear[get_sub_field('csv_year')] = get_transient('auto_matrix_json_'.get_sub_field('csv_year'));

                        if(!$csvYear[get_sub_field('csv_year')]){

                            $csvfield = get_sub_field('csv_file');

                            $csvfile = get_attached_file($csvfield['ID']);

                            $fh = fopen($csvfile, "r");

                            if($fh){
                                echo 'here';
                                $csvData = array();
                                $csvJson = "";

                                while (($row = fgetcsv($fh, 0, ",")) !== FALSE) {
                                    $csvData[] = $row;
                                }

                                $csvJson = json_encode($csvData);

                               if($csvJson){
                                   set_transient( 'auto_matrix_json_'.get_sub_field('csv_year'), $csvJson, 86400 );
                               }
                            }
                        }
                    }
                }
                return $csvYear;
            }



    	}

    	GF_Fields::register(new CustomFieldsGravityAutoType());
    }
}

add_action( 'plugins_loaded', 'gravityFormCustomFieldType' );

?>
