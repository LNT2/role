				<form>		
				<input type="hidden" name="username" placeholder="Username" value="LNO">
				<input type="hidden" name="password" placeholder="Password" value="<?php echo $pass; ?>">
				<p>kod för menyträdet</p>
				<input type="radio" name="operation" value="insert">insert
				<input type="radio" name="operation" value="update">update
				<input type="radio" name="operation" value="delete">delete
				<textarea name="text"></textarea>
				<textarea name="header"></textarea>
				<textarea name="code"></textarea>
				<textarea name="image"></textarea>
				<textarea name="alt"></textarea>
				<input name="menu_id" type="number" value ="0">
			    <input type="submit" name="submit">			
			    </form>