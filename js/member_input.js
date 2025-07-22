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
        // 3. 이름 입력 확인
        if(f.name.value == '') {
            alert('이름을 입력해주세요.')
            f.name.focus()
            return false
        }
        // 4. 비밀빈호 및 비밀번호 확인란 입력 여부
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
        // 5. 비밀번호 일치 확인
        if(f.password.value != f.password_confirm.value) {
            alert('비밀번호가 일치하지 않습니다. 다시 입력해주세요.')
            f.password.value = ''
            f.password_confirm.value = ''
            f.password.focus()
            return false
        }
        // 6. 이메일 입력 체크
        if(f.email.value == '') {
            alert('이메일을 입력해주세요.')
            f.email.focus()
            return false
        }
        // 7. 이메일 중복확인 여부
        if(f.email_chk.value == "0") {
            alert('중복되는 이메일이 있습니다. 다른 이메일을 사용해주세요.')
            return false
        }
        // 8. 우편번호 입력 체크
        if(f.zipcode.value == '') {
            alert("우편번호를 입력해주세요.")
            return false
        }
        // 9. 주소 및 상세주소 입력 체크
        if(f.addr.value == '') {
            alert("주소를 입력해주세요.")
            f.addr.focus()
            return false
        }
        if(f.addr_detail.value == '') {
            alert("상세주소를 입력해주세요,")
            f.addr_detail.focus()
            return false
        }
        f.submit() // form에 action 주소로 제출됨.
    })

    // 우편번호 찾은 후 삽입
    const btn_zipcode = document.querySelector("#btn_zipcode")
    btn_zipcode.addEventListener("click", () => {
        new daum.Postcode({
        oncomplete: function(data) {
            console.log(data)
            let addr = ''
            let extra_addr = ''

            if(data.userSelectedType == 'J') {
                addr = data.jibunAddress
            } else if(data.userSelectedType == 'R') {
                addr = data.roadAddress
            }
            if(data.bname != '') {
                extra_addr = data.bname
            }
            if(data.buildingName != '') {
                if(extra_addr == '') {
                    extra_addr = data.buildingName
                } else {
                    extra_addr += ', ' + data.buildingName
                }
            }
            if(extra_addr != '') {
                extra_addr = ' (' + extra_addr + ')'
            }
            const f_addr = document.querySelector('#f_addr')
            f_addr.value = addr + extra_addr

            const f_zipcode = document.querySelector("#f_zipcode")
            f_zipcode.value = data.zonecode

            const f_addr_detail = document.querySelector("#f_addr_detail")
            f_addr_detail.focus()
        }
    }).open();
    })
    // 이미지 삽입 인식
    const f_photo = document.querySelector("#f_photo")
    f_photo.addEventListener("change", (e) => {
        // 이미지 로딩 시작
        console.log(e)
        const reader = new FileReader() // FileReader 객체 -> 파일이 읽어들였을 때 핸들링 가능
        reader.readAsDataURL(e.target.files[0])

        // 이미지 로딩 끝나는 시기 확인(onload)
        reader.onload = function(event) {
            //console.log(event)
            const f_preview = document.querySelector("#f_preview")
            f_preview.setAttribute("src", event.target.result)
        }
    })
})