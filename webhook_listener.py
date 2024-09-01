from flask import Flask, request
import os
import git

app = Flask(__name__)

@app.route('/webhook', methods=['POST'])
def webhook():
    if request.method == 'POST':
        repo = git.Repo('/path/to/your/clone')  # Path where your repo is cloned on EC2
        origin = repo.remotes.origin
        origin.pull()
        # Optional: Restart services or any other post-pull actions
        return 'Webhook received and processed', 200
    else:
        return 'Invalid request', 400

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=80)
