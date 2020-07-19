
            $(document).ready( function () {
                $('.delete_form').on('submit',function(){
                    if(confirm("R U sure?")){
                        return true;
                    }else{
                        return false;
                    }
                });
            });
