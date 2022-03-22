<?php
/**
 * Plugin Name: BooqableProduct
 * Plugin URI: https://believintech.com/
 * Description: 
 * Version: 1.0
 * Author: Yaminee Yadav
 * Author URI: https://believintech.com/
 * */
global $BooqableProduct;

$BooqableProduct = new BooqableProduct();
class BooqableProduct{
	 public function __construct() {
		add_action('admin_menu', [$this, 'create_BooqableProduct']);
	 }
	public function create_BooqableProduct() {
       add_menu_page( 'BooqableProduct', 'BooqableProduct', 'manage_options', 'BooqableProduct', array(&$this, 'BooqableProduct_settings_options'),'dashicons-text-page', '10' );
	   
    }
    public function BooqableProduct_settings_options() {
       
        $exampleListTable = new Example_List_Table();
        $exampleListTable->prepare_items();
        
       // $exampleListTable->search_box('search user', 'search_id');
        ?>
       <form method="POST" id="wp_form1">
        <div class="wrap">
           
                <div id="icon-users" class="icon32"></div>
                <h2>BooqableProduct</h2>
				<?php if(array_key_exists('btn_import', $_POST)) {
						import_pro_function();
						} ?>
						<?php if(array_key_exists('btn_fetch_data_manually', $_POST)) {
							cron_fetch_booqable_hook();
						} ?>
				<form method="post">
					<input type="submit" name="btn_import"
							class="button" value="Import" />
							<input type="submit" name="btn_fetch_data_manually"
							class="button" value="Fetch data Manually" />
				</form>
				<!--   <a href="javascript:void(0);" onclick="call_cron_function();">Fetch data Manually</a>-->
                <?php $exampleListTable->display(); ?>
            </div>
        
    </form>
	<!-- <script> 
	jQuery(document).ready(function(){
	function call_cron_function(){
		alert("test");
		var result = '<?php echo booqable_hook_function(); ?>';
		return result;
	}
	});
	
	</script> */-->
       <?php     
        
    }	
}
// First check the wp list table class exist or not
if ( ! class_exists( 'WP_List_Table' ) ) {
	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

// create a cls which extend the property of wp list table cls
class Example_List_Table extends WP_List_Table{
     
    public function exampleData(){
        $example_data= array();
		 $servicemainResults = array();
        global $wpdb;
		
/* 		$ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, 'https://vr-expert-testomgeving.booqable.com/api/1/products?api_key=3f77f941bc272c538d1d875ee3ad38efb15f11a495aacaac794113c0724cf714');

 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

 $contents = curl_exec($ch);
 $ObjData = json_decode($contents)->products;
 

        //  $results = $wpdb->get_results('Select * From wp_users');
          $i = 0;
          foreach($ObjData as $k => $cur)
         {
 $proDataMains = array(
                        'ProductID' =>$cur->id,
                        'ProductName' => $cur->name,
						 'ProductPrice' => $cur->base_price_in_cents
                    );
         array_push($example_data,$proDataMains);
          
            $i++;
          }
       */
	   				
		//global $wpdb;
          $booqable_product_plugin = $wpdb->get_results("SELECT * FROM booqable_data");
   
    $i = 0;
   foreach($booqable_product_plugin as $booqable_product_data => $booqable_product_ID){
	 $proDataMains = array(
	  'ProductID' =>$booqable_product_ID->booqable_product_id,
	  'ProductName' => $booqable_product_ID->booqable_product_name,
	 'ProductPrice' => $booqable_product_ID->booqable_product_price,
   'ProductSKU' => $booqable_product_ID->booqable_product_sku
	
  );
  array_push($example_data,$proDataMains);
    $i++;
}
 

        return $example_data;
   
    
          }  
          public function no_items() {
                _e( 'No user found' );
              }
              public   function prepare_items() {
                $columns  = $this->get_columns();
                $hidden   = array();
                $sortable = $this->get_sortable_columns();
               // $this->search_box('search', 'search_id');
              //  $exampledata =  $this->example_data;

                $this->_column_headers = array( $columns, $hidden, $sortable);
        
              
                 $defcolumn =  $this->column_default( $columns,   $hidden,  $sortable);
               // $this->items = $defcolumn;

               // $gtcolumns=$this->get_bulk_actions();
                $this->process_bulk_action();
                 
                
                $this->items = $this->exampleData();

            }
              
            public function get_sortable_columns() {
               
                }
                public function get_columns(){
                    $columns = array(
                        'cb'        => '<input type="checkbox" />',
                        'ProductID' => __( 'ProductID'),
                        'ProductName' => __( 'ProductName'),
						 'ProductPrice' => __( 'ProductPrice'),
             'ProductSKU' => __( 'ProductSKU')
                    );
                    return $columns;
                 }
                 public function column_default($st, $column_name) {
                    switch ($column_name) {
                        case 'ProductID':
                        case 'ProductName':
						 case 'ProductPrice':
              case 'ProductSKU':
                      //  case 'phnum':
                            return $st[$column_name];
                        default:
                            return print_r($st, true);
                    }
                }
                //  function column_default( $item, $column_name ) {
                //     // echo "test";
                //     switch( $column_name ) { 
                //         case 'ID':
                //         case 'name':
                //         case 'email':
                //         case 'phnum':
                //           return $item[ $column_name ];
                //         default:
                //           return print_r( $item, true ) ; //Show the whole array for troubleshooting purposes
                //       }
                    
                //   }
                    
                public function get_bulk_actions() {
                    $actions = array(
                        'delete'    => 'Delete'
                       
                    );
                    return $actions;
                    }
                  public  function process_bulk_action() { 
                   
                   // $id = $_REQUEST['status'];     
                        $entry_id = ( is_array( $_REQUEST['status'] ) ) ? $_REQUEST['status'] : array( $_REQUEST['status'] );
                       
                      // echo $entry_id[0];
                       
                        if ( 'delete' === $this->current_action() ) {
                          global $wpdb;
                           
                             $sql =  $wpdb->query( "DELETE FROM wp_users WHERE ID = $entry_id[0]");
                             if($sql){
                               echo "deleted";
                             }else{
                               echo "Not deleted";
                             }
                            
                        }
                        
                    }
                    
                    public  function column_cb($item) {
                        return sprintf(
                            '<input type="checkbox" name="status[]" value="%s" />',
                            //$this->_args['singular'],
                             $item['ID'],
                        );
                    }
                
                    public function handle_row_actions( $item, $column_name, $primary ) {
                        if($primary!==$column_name){
                            return '';
                        }
                        $action=[];
                        $action['edit']='<a href="" onclick="edit_data()" id="edtt">'.__('Edit').'</a>';
                        $action['delete']='<a class="del-row">'.__('Delete').'</a>';
                        //$action['quick-edit']='<a>'.__('Update').'</a>';
                        //$action['View']='<a>'.__('View').'</a>';

                        return $this->row_actions($action);

                    }
 
        // We need a primary defined so responsive views show something,
        // so let's fall back to the first non-checkbox column.
                
}//class
add_action('admin_enqueue_scripts', 'cstm_css_and_js');
 
 function cstm_css_and_js($hook) {

    if ( 'formdata' != $hook ) {
         return;
     }
 
   wp_enqueue_style('customstyle_css', url('/style/customstyle.css'));
    wp_enqueue_script('customjs_js', url('/js/custom.js' ));
 }
 
?>