const tablename='products';const ydebugger=false; var ytabled;
 var _imageCol = tablename+'_image';
/*When you want to use FAST CRUD of ytable and you have used joins in the listing use 
type:'ignore' 
in columns which are being shown by the join and not the part of , 

if column type is callback and typeData should be a function..
otherwise you can use typeData with dropdowns 

_default will set a default value for new records
*/
(async () => {
    /*turn below line on and pass flag type in the function it'll fetch latest dropdown automatically
    it'll load page a bit late but it works fine for dropdowns
    */
    var TYPEDATA = await getAjaxTable('category','id','name','is_deleted=0 and is_active=1');
    var Userdata = await getAjaxTable('users','id','name','is_active=1');
    var program_support = await getAjaxTable('program_support','id','name','is_active=1');
    var language_support = await getAjaxTable('language_support','id','name','is_active=1');
    ytabled = new ytable(tablename,[
        {
            column:'id',
            name:'ID',
            type:'hidden',
        }  
        ,{ 
            column:'category_id',
            name:'Category',
            type:'select2',
            typeData:TYPEDATA,
            callback:'setDropdownValue',           
            
        },
        { 
            column:'user_id',
            name:'Supplier',
            type:'select2',
            typeData:Userdata,
            callback:'setDropdownValue',           
            
        }            
        ,{
            column:'name',
            name:'Name',
            type:'text',
        }
        ,{
            column:'slug',
            name:'Slug',
            type:'slug',
            slugof:'name',
            hiddenInList:true,
        }
        ,{
            column:'product_by',
            name:'By',
            type:'text',
            hiddenInList:true,

        }
        ,{
            column:'dev_phone',
            name:'Developer Phone',
            type:'text',
            hiddenInList:true,
        }
        ,{
            column:'dev_email',
            name:'Developer Email',
            type:'text',
            hiddenInList:true,
        }
        ,{
            column:'dev_website',
            name:'Developer Website',
            type:'text',
            hiddenInList:true,
        }
        ,{
            column:'video_link',
            name:'Video Link',
            type:'text',
            hiddenInList:true,
        }
        ,{ 
            column:'program_support',
            name:'Program Support',
            type:'multiselect',
            typeData:program_support,
            callback:'setMultiselectValue',           
            hiddenInList:true,
        }
        ,{ 
            column:'language_support',
            name:'Language Support',
            type:'multiselect',
            typeData:language_support,
            callback:'setMultiselectValue', 
            hiddenInList:true,
        }
        
        ,{ 
            column:'market_support',
            name:'Market Support',
            type:'multiselect',
            typeData:{
             1 : 'US',
             2 : 'Canada',
             3 : 'Mexico',
             4 : 'South Africa',
             5 : 'Turkey',
             6 : 'UK',
             7 : 'netherland',
             8 : 'Spain',
             9 : 'italy',
             10 : 'germany',
             11 : 'france',
             12 : 'Saudi Arabia',
             13 : 'Egypt',
             14 : 'UAE',
             15 : 'Singapore',
             16 : 'Japan',
             17 : 'China',
             18 : 'India',
             19 : 'Australia',
            },
            callback:'setMultiselectValue',   
            hiddenInList:true,
        }
        ,{
            column:'functionality',
            name:'Functionality',
            type:'wyswig',
            hiddenInList:true,
        }
        ,{
            column:'features',
            name:'Features',
            type:'wyswig',
            hiddenInList:true,
        }
        ,{
            column:'description',
            name:'Description',
            type:'wyswig',
            hiddenInList:true,
        }
        ,{
            column:'whoshould',
            name:'Who should use this?',
            type:'wyswig',
            hiddenInList:true,
        }
        ,{
            column:'pricing_information',
            name:'Pricing Information',
            type:'wyswig',
            hiddenInList:true,
        }
        // ,{
        //     column:'field_description_wyswig',
        //     name:'WYSWIG',
        //     type:'wyswig',
        // }
        // ,{
        //     column:'field_type',
        //     name:'Type',
        //     type:'dropdown',
        //     typeData:TYPEDATA,
        //     hiddenInList:true,
        //     callback:'setDropdownValue'
        // }
        // ,{
        //     column:'field_type',
        //     name:'Type',
        //     type:'select2',
        //     typeData:TYPEDATA,
        //     hiddenInList:true,
        //     callback:'setDropdownValue'
        // }
        // ,{
        //     column:'field_type',
        //     name:'Type',
        //     type:'multiselect',
        //     typeData:TYPEDATA,
        //     hiddenInList:true,
        //     callback:'setMultiselectValue'
        // }
        // ,{
        //     column:'color_field_name',
        //     name:'Color Picker',
        //     type:'color',
        // }
        /*if you want to show this field in view and it's a file path then use this*/
        // ,{
        //     column:'field_file',
        //     name:'Field',
        //     type:'callback',
        //     hiddenInList:true,
        //     typeData:'createAnchor'
        // }
        ,{
            column:_imageCol,
            name:'Image',
            callback:'show_image_ytable',
            type:'image',
            typeData : _imageCol,
            hiddenInList:true,
        }
        ,{
            column:'img_id',
            type:'ignore',
            hiddenInList:true,
        }
        ,{
            column:'connection_type',
            name:'Connection Type',
            type:'dropdown',
            typeData:{
             1 : 'Database',
             2 : 'API',
             3 : 'Affiliate',
            },
            hiddenInList:true,
        },{
            column:'db_host',
            name:'Database Hostname',
            type:'text',
            hiddenInList:true,
        },{
            column:'db_user',
            name:'Name',
            type:'Database UserName',
            hiddenInList:true,
        },{
            column:'db_pass',
            name:'Database Password',
            type:'text',
            hiddenInList:true,
        },{
            column:'db_database',
            name:'Database Name',
            type:'text',
            hiddenInList:true,
        },{
            column:'usertable',
            name:'User table Name',
            type:'text',
            hiddenInList:true,
        },{
            column:'firstname',
            name:'Column Name for First Name',
            type:'text',
            hiddenInList:true,
        },{
            column:'lastname',
            name:'Column Name for Last Name',
            type:'text',
            hiddenInList:true,
        },{
            column:'username',
            name:'Column Name for Email',
            type:'text',
            hiddenInList:true,
        },{
            column:'password',
            name:'Column Name for Password',
            type:'text',
            hiddenInList:true,
        },{
            column:'substable',
            name:'Subscription Table Name',
            type:'text',
            hiddenInList:true,
        },{
            column:'userid',
            name:'Column Name for User ID',
            type:'text',
            hiddenInList:true,
        },{
            column:'expiredate',
            name:'Column Name for Subscription Expire Date',
            type:'text',
            hiddenInList:true,
        },{
            column:'subscriptionid',
            name:'Column Name Subscription ID',
            type:'text',
            hiddenInList:true,
        },{
            column:'plantype',
            name:'Column Name for Plan Type',
            type:'text',
            hiddenInList:true,
        },{
            column:'regapi',
            name:'Register EndPoint',
            type:'text',
            hiddenInList:true,
        },{
            column:'usercancel',
            name:'Cancel Register EndPoint',
            type:'Database UserName',
            hiddenInList:true,
        },{
            column:'subsapi',
            name:'Subscription EndPoint',
            type:'text',
            hiddenInList:true,
        },{
            column:'cancelapi',
            name:'Cancel Subscription EndPoint',
            type:'text',
            hiddenInList:true,
        },{
            column:'affiliate_url',
            name:'Affiliate URL',
            type:'text',
            hiddenInList:true,
        }
         ,{
            column:'is_featured',
            name:'Is Popular?',
            callback:'is_active',
            type:'hidden',
        }
        ,{
            column:'is_recommend',
            name:'Is Recommended?',
            callback:'is_active',
            type:'hidden',
        }
        ,{
            column:'is_active',
            name:'Is Active?',
            callback:'is_active',
            type:'checkbox',
        }
        
        
    ],
    [
         { "left join" : "(select id as img_id,ref_id,table_name as img_tblename,img_path as "+_imageCol+" from imagetable where imagetable.table_name='"+tablename+"' and imagetable.type='1') as imagetable on  imagetable.ref_id="+tablename+".id" } ,
         //{ "left join" : "(select id as img_id_thumb,ref_id as thumb_ref_id,table_name as img_tblename_thumb,img_path as table_thumb_image from imagetable where imagetable.table_name='table_thumb' and imagetable.type='1') as imagetable_thumb on  imagetable_thumb.thumb_ref_id=table.id" } ,
    ],
    [
        '<button data-toggle="tooltip" onclick="uploadedImages(this)" class="btn btn-outline-info btn--icon" data-placement="top" title="" data-original-title="Upload Images"><i class="zmdi zmdi-collection-image zmdi-hc-fw"></i></button>',
        'editFast',
        'viewFast',
        'delete',
    ],'.ytable',{
        "where":{
            "is_active":"IN('0','1')",
            //"is_active":"='1'",
            "and":[
                {
                    col:"is_deleted",
                    condition:"=",
                    value:"0",
                }
                // ,{
                //     col:"user_id",
                //     condition:"=",
                //     value:document.getElementById('loggedinid').value,
                // }
            ],
            /*"or":[
                {
                    col:"is_deleted",
                    condition:"=",
                    value:"'0'",
                },
                {
                    col:"user_id",
                    condition:"=",
                    value:document.getElementById('loggedinid').value,
                }
            ]*/
        },
        "order by" : "id desc",
        // "group by" : "table.id",
    },ydebugger);
    //ytabled.uniqueCol = 'table_id';
    ytabled.autoCallbacksonBuild.push('turnOnDblClickCopyyTable');
window.addEventListener('ytable_beforeRow', function (e) {
    //console.log(e.detail);
    //var olddata = ytabled.currentData[e.detail.dataIndex].id;
    //ytabled.currentData[e.detail.dataIndex].id = '<a href="javscript:void(0)">'+olddata+'</a>';
});
window.addEventListener('ytable_afterRow', function (e) {
    //console.log(e.detail);
    /*here you will get the unique index of every row added in the ytable*/
    // $product_detail = Helper::fireQuery("select * from products");
    // foreach ($product_detail as $key => $value) {
    //         $product_detail = new product_detail;
    //         $product_detail->category_id=$value->category_id;
    //         $product_detail->product_id=$value->id;
    //         $products->is_active=1;
    //         $products->save();
            
    //     }
    $('[data-toggle="tooltip"]').tooltip();
});
window.addEventListener('ytable_columnAdded_{columnName}', function (e) {
    /*Here you get specific column event only you can defnie events like 
        ytable_columnAdded_id
        ytable_columnAdded_name
        ytable_columnAdded_email
        ytable_columnAdded_updatedAt

    and then update only on those specific columns , this event will fire whenever the column is added in ytable
    */
    //console.log(e.detail);
    //ytabled.currentData[e.detail.dataIndex].id = 'TESTING UPDATE';
});
window.addEventListener('fastCrudSuccess', function (e) {
    /*Fires after you update/create record and that record is successfully updated/created 
    e.datail = response
    */
});
window.addEventListener('fastCrudFailed', function (e) {
    /*Fires after you try to update/create record and it fails either in validation or for some other reasons 
    e.datail = response
    */
});
window.addEventListener('fastCrudFromRendered', function (e) {
    /*Fires after your popup form has been rendered , if you want any function to work or event to bind
    on any input, from here you can do that...
    e.detail have the data of a row you've selected to edit, 
    if you've created a new record e.detail will be undefined
    console.log(e.detail);    
    */
    // $('[name="category_id"]').change(async function(){
    //     var _data = await getAjaxTable('category','id','name','IFNULL(parent_id,0)='+$(this).val());
    //     _data[0] = 'Please Select';
    //     var _html = '';
    //     for(data in _data){
    //         _data[data]
    //         _html+='<option value="'+data+'">'+_data[data]+'</option>';
    //     }
    //     $('[name="sub_category_id"]').html(_html);
    // });
    // $('[name="sub_category_id"]').change(async function(){
    //     var _data = await getAjaxTable('category','id','name','IFNULL(parent_id,0)='+$(this).val());
    //     _data[0] = 'Please Select';
    //     var _html = '';
    //     for(data in _data){
    //         _data[data]
    //         _html+='<option value="'+data+'">'+_data[data]+'</option>';
    //     }
    //     $('[name="sub_category2_id"]').html(_html);
    // });
    $("[name='type_id']").val(1)
});
})();

var enableFastCrud = ()=>{
    document.getElementsByClassName('ytable-addrecord')[0].addEventListener('click',(e)=>{
        $('#ytable-FastCRUD').modal('toggle');
        document.getElementById('ytable_table').value=tablename;
        document.getElementById('unique_column').value=ytabled.uniqueCol;
        fastCRUDForm(ytabled);
    })
}
function uploadedImages(obj){
    var _id = $(obj).parent().parent().data('ytablerowid');
    var _url = base_url('adminiy/listing/imagetable-listing#table_name=products&ref_id='+_id+"&type=2");
    window.location=_url
}
// function createAnchor(col,value){
//     _src = img_url(value);
//     return '<a href="'+_src+'" target="_blank" data-toggle="tooltip" title="Preview/Download File" class="btn btn-dark btn--icon-text"><i class="zmdi zmdi-eye"></i> File</a>';
