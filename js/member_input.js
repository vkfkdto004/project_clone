document.addEventListener("DOMContentLoaded", () => {
    // 아이디 중복 체크
    const btn_id_check = document.querySelector("#btn_id_check")
    btn_id_check.addEventListener("click", () => {
        const f_id = document.querySelector("#f_id")
        if(f_id.value == '') {
            alert('아이디를 입력해주세요.')
            return false //아이디가 입력되면 false
        }
        //AJAX 통신을 통해서 DB쿼리 진행
        const f1 = new FormData()
        f1.append('id', f_id.value)
        f1.append('mode', 'id_chk') // member_process가 id 중복체크 용도로만 사용하는 것이 아니기 떄문에 구분하기 위해서 사용


        const xhr = new XMLHttpRequest()
        xhr.open("POST", "./pg/member_process.php", "true") // true -> 비동기 방식을 사용할 것인가?
        xhr.send(f1) // form 데이터 객체를 넣어서 send

        xhr.onload = () => {
            // 아이디 중복 처리
            if(xhr.status == 200) {
                const data = JSON.parse(xhr.responseText)
                if(data.result == 'success') {
                    alert('사용이 가능한 아이디입니다.')
                    document.input_form.id_chk.value = "1"
                } else if(data.result == 'fail') {
                    document.input_form.id_chk.value = "0"
                    alert('이미 사용중인 아이디입니다. 다른 아이디를 입력해주세요.')
                    f_id.value = ' '
                    f_id.focus()
                } else if (data.result == 'empty_id') {
                    alert('아이디 입력란이 비었습니다. 아이디를 입력해주세요.')
                    f_id.focus()
                }
            }
        }
    })

    // 이메일 중복 체크
    const btn_email_check = document.querySelector("#btn_email_check")
    btn_email_check.addEventListener("click", () => {
        const f_email = document.querySelector("#f_email")
        if(f_email.value == '') {
            alert('이메일을 입력해주세요.')
            f_email.focus()
            return false
        }
        //AJAX 통신을 통해서 DB쿼리 진행
        const f1 = new FormData()
        f1.append('email', f_email.value)
        f1.append('mode', 'email_chk')

        const xhr = new XMLHttpRequest()
        xhr.open("POST", "./pg/member_process.php", "true")
        xhr.send(f1)
        xhr.onload = () => {
            // 이메일 중복 처리
            if(xhr.status == 200) {
                const data = JSON.parse(xhr.responseText)
                if(data.result == 'success') {
                    alert('사용이 가능한 이메일입니다.')
                    document.input_form.email_chk.value = "1"
                } else if(data.result == 'fail') {
                    document.input_form.email_chk.value = "0"
                    alert('이미 사용중인 이메일입니다. 다른 이메일을 입력해주세요.')
                    f_email.value = ''
                    f_email.focus()
                } else if (data.result == 'empty_email') {
                    alert('이메일 입력란이 비었습니다. 이메일을 입력해주세요.')
                    f_email.focus()
                }
            }
        }
    })

    // 가입버튼 클릭 시 액션
    const btn_submit = document.querySelector("#btn_submit")
    btn_submit.addEventListener("click", () => {
        const f = document.input_form
        // 1. 아이디 입력 체크
        if(f.id.value == '') {
            alert('아이디를 입력해주세요.')
            f.id.focus()
            return false
        }
        // 2. 아이디 중복확인 여부
        if(f.id_chk.value == "0") {
            alert('아이디 중복확인을 해주시기 바랍니다.')
            return false
        }
        // 3. 비밀빈호 및 비밀번호 확인란 입력 여부
        if(f.password.value == '') {
            alert('비밀번호를 입력해주세요.')
            f.password.focus()
            return false
        }
        if(f.password_confirm.value == '') {
            alert('비밀번호 확인란을 입력해주세요.')
            f.password_confirm.focuse()
            return false
        }
        // 4. 비밀번호 일치 확인
        if(f.password.value != f.password_confirm.value) {
            alert('비밀번호가 일치하지 않습니다. 다시 입력해주세요.')
            f.password.value = ''
            f.password_confirm.value = ''
            f.password.focus()
            return false
        }
        // 5. 이메일 입력 체크
        if(f.email.value == '') {
            alert('이메일을 입력해주세요.')
            f.email.focus()
            return false
        }
        // 6. 이메일 중복확인 여부
        if(f.email_chk.value == "0") {
            alert('중복되는 이메일이 있습니다. 다른 이메일을 사용해주세요.')
            return false
        }


    })

})