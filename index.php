<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <style>
            /*.container {width:600px};*/
        </style>
    </head>
    
    <body>
        
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <form id="generate">
                        <br>
                        <input type="text" name="how_many" id="how_many" placeholder="How many input you want?" class="form-control" />    
                        <br>
                        <button type="submit" class="btn btn-primary">Generate Form</button>
                    </form>
                    
                    <div class="mt-5">
                        <div class="card">
                            <div class="card-header">Form output</div>
                                <div class="card-body">
                                <form id="submit_form">
                                    <div id="output-input">
                                        
                                    </div>
                                    <button type="submit" id="submit_form_btn" class="btn btn-primary mt-3" style="display:none">Submit Form</button>
                                </form>        
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
                
                
                <div class="col-lg-6">
                    <div class="card mt-4">
                        <dvi class="card-header">Sample inserted data</dvi>
                        <div class="card-body">
                            <div id="view_table">
                        <?php include_once('data.php');?>
                    </div>        
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script type="text/javascript">
        
            
            function generateForm(berapa){
                var how_many = berapa
                var output_input = ""
                for(var i = 0; i < how_many; i++){
                    output_input += "<div class='row mt-2'>"
                    output_input += `<label class='col-2 col-form-label text-right'> Input ${(i+1)}</label>`
                    output_input += "<div class='col-5'>"
                    output_input += `<input type='text' class='form-control' name='input_${i}' required />`
                    output_input += "</div>"
                    output_input += "</div>"
                }
                $('#output-input').html(output_input)
            }
            
            $('#generate').submit(function(e){
                e.preventDefault()
                generateForm($('#how_many').val())
                $('#submit_form_btn').show()
            })  
            
            $('#submit_form').submit(function(e){
                e.preventDefault()
                
                const data = new FormData(event.target);
                const value = Object.fromEntries(data.entries());
                
                $.ajax({
                    url: 'submit-input.php',
                    method: 'post',
                    data: {
                        data: value
                    },
                    success: function(data){
                        $('#view_table').html(data)
                        $('#submit_form')[0].reset();
                        $('#how_many').val('')
                    }
                })
            })
        </script>
    </body>
</html>