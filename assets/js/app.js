require('../css/app.css');


import React from 'react';
import ReactDOM from 'react-dom';

import AddForm from './Components/AddForm';
import Contact from './Components/Contact';


class App extends React.Component {
    constructor() {
        super();

        this.state = {
            contacts: []
        };
    }

    loadContacts() {

        fetch('/api/getList?perpage=100&page=1')
            .then(response => response.json())
            .then(respData => {
                this.setState({
                    contacts: respData.data.entities
                });
            });

    }

    componentDidMount() {

        this.loadContacts();

    }

    render() {
        return (
            <div className="row">
                <AddForm
                    reloadContacts={() => this.loadContacts()}
                >

                </AddForm>
                {this.state.contacts.map((contact) => (
                    <Contact
                        key={contact.id}
                        id={contact.id}
                        name={contact.attributes.name}
                        phone={contact.attributes.phone}
                        info={contact.attributes.info}
                        photo={contact.attributes.photo}
                        reloadContacts={() => this.loadContacts()}
                    >
                    </Contact>
                ))}
            </div>
        );
    }
}

window.showResponseModal = function (respData) {

    return new Promise(function (resolve, reject) {

        if (typeof respData.error !== "undefined") {

            swal("Error", respData.error.message ? respData.error.message : "", "error");

            return;

        }

        if (typeof respData.status !== "undefined") {

            if (respData.status === "success") {

                swal("Success", respData.message ? respData.message : "", "success").then(resolve);

            } else {

                swal("Error", respData.message ? respData.message : "", "error");

            }

        } else {

            swal("Unexpected error", respData.message ? respData.message : "", "error");

        }

    })

}

window.SelectFiles = function (multiple = false) {

    multiple = !!multiple;

    let input = document.createElement('input');
    input.type = 'file';
    input.multiple = multiple;
    input.style.opacity = 0;
    input.style.width = "0px";
    input.style.height = "0px";
    input.style.display = 'none';

    document.getElementsByTagName('body')[0].appendChild(input);

    input.value = "";
    input.click();

    return new Promise(function (resolve, rej) {

        input.onchange = function () {

            if (input.files.length > 0) {

                resolve(input.files);

            } else {

                rej(new Error("Nothing selected"));

            }

        };

        document.body.onfocus = function () {

            setTimeout(function () {

                document.body.onfocus = null;

                if (input.files.length == 0) {

                    rej(new Error("Nothing selected"));

                }

                input.remove();

            }, 1000);

        };

    });

};

ReactDOM.render(<App/>, document.getElementById('root'));