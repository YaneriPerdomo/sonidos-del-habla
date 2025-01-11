<?php
function showMsg($smg, $location = ''){
    if ($location != '') {
        echo '<script>
                alert (" ' . $smg . ' ");
                window.location.href = "' . $location . '"
             </script>';
    } else {
        echo '<script>
                alert (" ' . $smg . ' ");
             </script>';
    }
}

?>