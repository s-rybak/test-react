import React from 'react';

class AddForm extends React.Component {

    constructor(props) {
        super(props);
        this.state = {
            open: false,
            formValues: {
                name: "",
                phone: "",
                info: "",
                photo: "https://via.placeholder.com/65?text=img",
                file: null
            }
        };
    }

    componentDidMount() {

        if (this.props.id) {

            this.setState({
                open: !!this.props.id,
                formValues: {
                    name: this.props.name ? this.props.name : "",
                    phone: this.props.phone ? this.props.phone : "",
                    info: this.props.info ? this.props.info : "",
                    photo: this.props.photo ? this.props.photo : "https://via.placeholder.com/65?text=img",
                }
            });

        }

    }

    handleChange(event) {

        this.state.formValues[event.target.name] = event.target.value;

        this.setState(this.state);
    }

    saveForm() {

        const url = this.props.id ? `/api/edit/${this.props.id}` : '/api/add';
        const formData = new FormData();

        if (this.state.formValues.file) {

            formData.append('photo', this.state.formValues.file);

        }

        formData.append('name', this.state.formValues.name);
        formData.append('phone', this.state.formValues.phone);
        formData.append('info', this.state.formValues.info);

        const options = {
            method: 'POST',
            body: formData,
        };

        fetch(url, options)
            .then(resp => resp.json())
            .then(showResponseModal)
            .then(() => {

                !!this.props.id && this.props.close();

                console.log(231);

                this.props.reloadContacts();

            })
            .catch(function (msg) {

                swal("Error", typeof msg == "string" ? msg : JSON.stringify(msg), "error");

            });
        ;

    }

    selectFile() {

        SelectFiles()
            .then((res) => {

                let fr = new FileReader();
                let self = this;

                fr.onload = function () {

                    self.state.formValues.photo = this.result;
                    self.setState(self.state)

                };

                fr.readAsDataURL(res[0]);

                this.state.formValues.file = res[0];

                this.setState(this.state)

            })

    }

    render() {

        let avatarStyle = {
            backgroundImage: `url(${this.state.formValues.photo})`,
        };

        return (
            <form className="col-md-12">
                {!this.state.open && !this.props.id ?
                    <button type="button" onClick={() => this.setState({open: true})}
                            className="btn btn-primary btn-block">Add new</button> :
                    <div className="card">
                        <div className="card-header">
                            Add new contact
                            <button type="button" onClick={() => {
                                this.setState({open: false});
                                !!this.props.close && this.props.close()
                            }}
                                    className="btn btn-secondary btn-sm float-right">X
                            </button>
                        </div>
                        <div className="card-body">
                            <div className="form-row">
                                <div className="col-2 contact-avatar-holder">
                                    <div className="contact-avatar" style={avatarStyle}
                                         onClick={() => this.selectFile()}>

                                    </div>
                                </div>
                                <div className="col">
                                    <div className="input-group mb-3">
                                        <div className="input-group-prepend">
                                            <span className="input-group-text"
                                                  id="inputGroup-sizing-default">Name *</span>
                                        </div>
                                        <input type="text" className="form-control" aria-label="Name"
                                               aria-describedby="inputGroup-sizing-default"
                                               value={this.state.formValues.name}
                                               name="name"
                                               onChange={this.handleChange.bind(this)}
                                        />
                                    </div>
                                </div>
                            </div>
                            <div className="form-row">
                                <div className="input-group mb-3">
                                    <div className="input-group-prepend">
                                    <span className="input-group-text"
                                          id="inputGroup-sizing-default">Phone number *</span>
                                    </div>
                                    <input type="phone" className="form-control" aria-label="Phone number"
                                           aria-describedby="inputGroup-sizing-default"
                                           value={this.state.formValues.phone}
                                           name="phone"
                                           onChange={this.handleChange.bind(this)}
                                    />
                                </div>
                            </div>
                            <div className="form-row">
                                <div className="input-group mb-3">
                                    <div className="input-group-prepend">
                                    <span className="input-group-text"
                                          id="inputGroup-sizing-default">Additional info</span>
                                    </div>
                                    <textarea className="form-control" aria-label="Additional info"
                                              aria-describedby="inputGroup-sizing-default"
                                              value={this.state.formValues.info}
                                              name="info"
                                              onChange={this.handleChange.bind(this)}
                                    >
                                    </textarea>
                                </div>
                            </div>
                            <div className="form-row">
                                <button type="button"
                                        className="btn btn-primary btn-block"
                                        onClick={() => this.saveForm()}
                                >{this.props.id ? "Save" : "Add"}</button>
                            </div>
                        </div>
                    </div>
                }

            </form>
        )
    }
}

export default AddForm;