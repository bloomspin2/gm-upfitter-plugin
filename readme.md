## Description

This is a custom plugin used to extend Gravity Forms in order to integrate with existing and future forms.

## Installation:

1. Login to wp-admin
2. Goto plugins Add New
3. Upload plugin folder as a zip file
4. Activate Plugin
5. Goto "Automotive Matrix" in wp-admin
6. Choose a Date and upload csv file. CSV file can be found in sampledata folder.
7. Goto Gravity forms add the Custom Automotive fields.
8. Save Form

** note Auto Year field must be added to the form or the data will not be pulled into the form fields properly


## Support Candy

1. Goto Support -> Settings - > Gravity Forms
2. Edit the Contact Us Form
3. Make sure the fields match the Vehicle fields.
4. Save
5. If the field ID's change on the front end you will have to change the code in the plugin plugins\Upfitter-GravityForms-Tweaks\Upfitter-gravity-forms-tweaks.php "<b>Model Year:</b> " . $_POST['input_41'] . "<br>" will need to be the proper field name on submit of the form.
