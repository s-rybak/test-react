import React from 'react';
import AddForm from "./AddForm";

class Contact extends React.Component {

    constructor(props) {
        super(props);
        this.state = {
            edit: false,
            show: true
        };
    }

    closeEdit() {

        this.setState({
            edit: false
        })

    }

    delete() {

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this contact",
            icon: "warning",
            buttons: {
                cancel: "No",
                text: "Delete",
                closeModal: false,
            },
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {

                    fetch(`/api/delete/${this.props.id}`, {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                        }
                    })
                        .then(resp => resp.json())
                        .then(showResponseModal)
                        .then(() => {

                            this.setState({show: false})

                        })
                        .catch(function (msg) {

                            swal("Error", typeof msg == "string" ? msg : JSON.stringify(msg), "error");

                        });
                } else {

                    swal("Your contact is safe!");

                }
            });

    }

    render() {

        let avatarStyle = {
            backgroundImage: `url(${this.props.photo ? `/${this.props.photo}` : "https://via.placeholder.com/65?text=img"})`,
        }

        return this.state.show ? (
            <div className="col-md-12 contact-block">
                {!this.state.edit ? (
                        <div className="card container">
                            <div className="card-body">
                                <div className="row">
                                    <div className="col-md-2">
                                        <div className="contact-avatar" style={avatarStyle}>

                                        </div>
                                        <input type="file" className="d-none"/>
                                    </div>
                                    <div className="col-md-6 text-center">
                                        <h5>{this.props.name ? this.props.name : "No name"}</h5>
                                        <p>{this.props.phone ? this.props.phone : "No phone"}</p>
                                    </div>
                                    <div className="col-md-4 text-center">
                                        <div className="btn-group" role="group">
                                            <button type="button" className="btn btn-outline-primary"
                                                    onClick={() => {
                                                        this.setState({edit: true})
                                                    }}>Edit
                                            </button>
                                            <button type="button" className="btn btn-outline-danger"
                                                    onClick={() => this.delete()}>Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div className="row text-center">
                                    <div className="col-md-12">
                                        <p>{this.props.info ? this.props.info : "No info"}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ) :
                    <AddForm
                        id={this.props.id ? this.props.id : "no_id"}
                        name={this.props.name ? this.props.name : "No name"}
                        phone={this.props.phone ? this.props.phone : "No phone"}
                        info={this.props.info ? this.props.info : "No info"}
                        photo={this.props.photo ? `/${this.props.photo}` : "https://via.placeholder.com/65?text=img"}
                        close={() => this.closeEdit()}
                        reloadContacts={() => this.props.reloadContacts()}
                    ></AddForm>}
            </div>

        ) : ""
    }

}

export default Contact;