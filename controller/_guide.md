<h1>
Sending Data to Views
</h1>

<p>
The only recommended method for sending the data to the views is via.
the controller associated with that page. Using random names while
even sending the data even from the controller is not preferred. We
will use an array that will send the data. We will call that array
as <code>$contentParam</code>.
</p>

<p>
The following will be the format of the keys inside the array that 
will be sent to the view page:
</p>

1. Variables defined in view file : `['view_variableName'=>'viewdata_value']`
2. Variables with error data: `['error_fieldName'=>'error_onrule']`
3. Variables about the meta data: `['meta_dataName'=>'metaData_value']`
4. Variables about the main data: `['main_dataName'=>'mainData_value']`

> The first type of variable i.e. Variables defined in view file will be 
> only used for generating and processing the views.