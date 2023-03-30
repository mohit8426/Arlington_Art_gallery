
from flask import Flask,render_template, request
from flask_mysqldb import MySQL





#from flaskext.mysql import MySQL

app = Flask(__name__)

app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'art gallery'

mysql = MySQL(app)


@app.route('/Insert_data.html', methods=['GET', 'POST'])
def insert_data():
    if request.method == "POST":
        details = request.form
        stateName = details["stateName"]
        stateAb = details["stateAb"]
        cur = mysql.connection.cursor()
        cur.execute("INSERT INTO STATE(stateName,stateAb) VALUES(%s,%s)", (stateName, stateAb))
        mysql.connection.commit()
        cur.close()
        return 'success'
    return render_template('index.html')
