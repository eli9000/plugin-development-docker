<?php

// Adds "Field Label Visibility" dropdown to form fields. This allows for labels to be hidden.
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );
