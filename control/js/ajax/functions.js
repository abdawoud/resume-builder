function Login(){
    $.ajax({
        url: "./lib/ajax/Login.php",
        type: "post",
        data: {
            Username: $('#LoginUsername').val(),
            Password: $('#LoginPassword').val()
        },
        success: function(data){
            if(data == 0){
                $('#LoginResponse').html('Error: Invalid input!');
            } else if(data == 1) {
                $('#LoginResponse').html('Error: User is inactive!');
            } else if(data == 2) {
                $('#LoginResponse').html('Error: User does not exist!');
            } else if(data == 3) {
                top.location = 'dashboard.php';
            }
        },
        error:function(){
            $('#LoginResponse').html('Error: Please try later!');
        }
    });
};

function Register(){
    $.ajax({
        url: "./lib/ajax/Register.php",
        type: "post",
        data: {
            Username: $('#RegisterUsername').val(),
            Email: $('#RegisterEmail').val(),
            Password: $('#RegisterPassword').val()
        },
        success: function(data){
            if(data == 0){
                $('#RegisterResponse').html('Error: Invalid input!');
            } else if(data == 1) {
                $('#RegisterResponse').html('Error: User with same information is already registered!');
            } else if(data == 2) {
                $('#RegisterResponse').html('Success: Activation Email is sent');
            } else if(data == 3) {
                top.location = 'dashboard.php';
            }
        },
        error:function(){
            $('#RegisterResponse').html('Error: Please try later!');
        }
    });
};

function SendPassword(){
    $.ajax({
        url: "./lib/ajax/SendPassword.php",
        type: "post",
        data: {
            Email: $('#ForgetEmail').val()
        },
        success: function(data){
            if(data == 0){
                $('#ForgetResponse').html('Error: Invalid input!');
            } else if(data == 1) {
                $('#ForgetResponse').html('Error: No use with specified email!');
            } else if(data == 2) {
                $('#ForgetResponse').html('Success: Password has been sent!');
            } else if(data == 3) {
                top.location = 'dashboard.php';
            }
        },
        error:function(){
            $('#ForgetResponse').html('Error: Please try later!');
        }
    });
};

function ChangeStatus(_id){

    $.ajax({
        url: "./lib/ajax/ChangeStatus.php",
        type: "post",
        data: {
            _id: _id
        },
        success: function(data){
            if(data == -1){
            } else {
                if(data == ''){
                    $('#'+_id).html('Inactive');
                } else {
                    $('#'+_id).html('Active');
                }
            }
        },
        error:function(){
        }
    });

}

function UpdatePersonalInformation(Resume_id){

    $.ajax({
        url: "./lib/ajax/UpdateResume.php",
        type: "post",
        data: {
            Action: 'PersonalInfo',
            Resume_id: Resume_id,
            FullName: $('#inputFullName').val(),
            BirthDate: $('#inputBirthDate').val(),
            Address: $('#inputAddress').val(),
            PhoneNumber:  $('#inputPhoneNumber').val()
        },
        success: function(data){
            console.log(data);
            if(data == ''){
                $('#personalInformationResponse').html('<div class="alert alert-warning">Fail While Saving</div>');
            } else {
                $('#personalInformationResponse').html('<div class="alert alert-success">Saved Successfully</div>');
            }
        },
        error:function(){
            $('#personalInformationResponse').html('<div class="alert alert-warning">Can\'t reach server!</div>');
        }
    });

}

function UpdateEducation(Resume_id){

    $.ajax({
        url: "./lib/ajax/UpdateResume.php",
        type: "post",
        data: {
            Action: 'Education',
            Resume_id: Resume_id,
            Institute: $('#inputInstitute').val(),
            College: $('#inputSpecialisation').val(),
            Year: $('#inputYear').val(),
            Courses:  $('#inputCourses').val()
        },
        success: function(data){
            console.log(data);
            if(data == ''){
                $('#educationResponse').html('<div class="alert alert-warning">Fail While Saving</div>');
            } else {
                $('#educationResponse').html('<div class="alert alert-success">Saved Successfully</div>');
            }
        },
        error:function(){
            $('#educationResponse').html('<div class="alert alert-warning">Can\'t reach server!</div>');
        }
    });

}

function UpdateTechnicalSkills(Resume_id){

    $.ajax({
        url: "./lib/ajax/UpdateResume.php",
        type: "post",
        data: {
            Action: 'TechnicalSkills',
            Resume_id: Resume_id,
            ProgrammingLanguages: $('#inputProgrammingLanguages').val(),
            Databases: $('#inputDatabases').val(),
            OperatingSystems: $('#inputOperatingSystems').val()
        },
        success: function(data){
            console.log(data);
            if(data == ''){
                $('#skillsResponse').html('<div class="alert alert-warning">Fail While Saving</div>');
            } else {
                $('#skillsResponse').html('<div class="alert alert-success">Saved Successfully</div>');
            }
        },
        error:function(){
            $('#skillsResponse').html('<div class="alert alert-warning">Can\'t reach server!</div>');
        }
    });

}

function UpdateWorkingExperience(Resume_id){

    $.ajax({
        url: "./lib/ajax/UpdateResume.php",
        type: "post",
        data: {
            Action: 'WorkingExperience',
            Resume_id: Resume_id,

            Organisation_1: $('#inputWorkingExperienceOrganisation_1').val(),
            Position_1: $('#inputWorkingExperiencePosition_1').val(),
            From_1: $('#inputWorkingExperienceFrom_1').val(),
            To_1: $('#inputWorkingExperienceTo_1').val(),
            Duties_1: $('#inputWorkingExperienceDuties_1').val(),


            Organisation_2: $('#inputWorkingExperienceOrganisation_2').val(),
            Position_2: $('#inputWorkingExperiencePosition_2').val(),
            From_2: $('#inputWorkingExperienceFrom_2').val(),
            To_2: $('#inputWorkingExperienceTo_2').val(),
            Duties_2: $('#inputWorkingExperienceDuties_2').val()

        },
        success: function(data){
            console.log(data);
            if(data == ''){
                $('#experienceResponse').html('<div class="alert alert-warning">Fail While Saving</div>');
            } else {
                $('#experienceResponse').html('<div class="alert alert-success">Saved Successfully</div>');
            }
        },
        error:function(){
            $('#experienceResponse').html('<div class="alert alert-warning">Can\'t reach server!</div>');
        }
    });

}

function UpdateTemplate(Resume_id){

    $.ajax({
        url: "./lib/ajax/UpdateResume.php",
        type: "post",
        data: {
            Action: 'Template',
            Resume_id: Resume_id,

            Template_id: $('input[name=Template]:checked', '#templateForm').val()
        },
        success: function(data){
            if(data == ''){
                $('#templateResponse').html('<div class="alert alert-warning">Fail While Saving</div>');
            } else {
                $('#templateResponse').html('<div class="alert alert-success">Saved Successfully</div>');
            }
        },
        error:function(){
            $('#templateResponse').html('<div class="alert alert-warning">Can\'t reach server!</div>');
        }
    });

}

function Finish(Resume_id){

    $.ajax({
        url: "./lib/ajax/UpdateResume.php",
        type: "post",
        data: {
            Action: 'Finish',
            Resume_id: Resume_id
        },
        success: function(data){
            console.log(data);
            if(data == ''){
                $('#exportResponse').html('<div class="alert alert-warning">Fail While Saving</div>');
            } else {
                top.location = './app/resumes/'+data;
                $('#exportResponse').html('<div class="alert alert-success">Saved Successfully</div>');
            }
        },
        error:function(){
            $('#exportResponse').html('<div class="alert alert-warning">Can\'t reach server!</div>');
        }
    });

}