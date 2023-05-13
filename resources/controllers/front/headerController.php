<?php
    function getDataHeader(){
        $query = query("SELECT * FROM header");
        confirmar($query);
        return fetch_assoc($query);
    }
?>