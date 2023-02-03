<div class="d-block my-2">
    <form action="" method="get">  
        <select name="orderby" class="form-select w-25 d-inline-block" aria-label="Sort by">
            <option <?=isset($_GET['orderby']) ? 'selected' : '' ?>>Sort by</option>
            <option <?=isset($_GET['orderby']) && $_GET['orderby'] == "userName" ? 'selected' : '' ?> name="userName" value="userName">Name</option>
            <option <?=isset($_GET['orderby']) && $_GET['orderby'] == "email" ? 'selected' : '' ?> name="email" value="email">Email</option>
            <option <?=isset($_GET['orderby']) && $_GET['orderby'] == "status" ? 'selected' : '' ?> name="status" value="status">Status</option>
        </select>
        <input type="submit" name="submit" value="Sort">  
    </form>
</div>