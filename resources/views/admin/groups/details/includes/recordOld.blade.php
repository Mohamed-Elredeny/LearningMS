<div id="record" class="tab-pane fade in ">
    <div class="container">
      
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4>اضافة منشور تسجيل صوتي</h4>
                        <p class="card-title-desc">وصف المنشور
                        </p>

                        <div class="mb-5">
                            {{-- <form method="post" action="{{route("groups.testfile")}}" enctype="multipart/form-data"  class="">
                                @csrf
                                <input name="uidfile" id="uidfile" type="hidden" value="{{uniqid()}}">
                                <textarea id="textarea" class="form-control" name="description"  rows="3" ></textarea>
                                <br>
                                <div class="dropzone" id="file-dropzonefile">
                                    <div class="fallback">
                                        <input name="file" type="file" multiple="multiple">
                                    </div>
                                </div>
                                
                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">أضافة المنشور</button>
                                </div>
                            </form> --}}


                                <article>
                            
                                    <section class="experiment recordrtc">
                                        <h2 class="header">
                                            <select class="recording-media" >
                                                <!-- <option value="record-video">Video</option> -->
                                                <option value="record-audio" selected>Audio</option>
                                                <!-- <option value="record-screen">Screen</option> -->
                                            </select>
                            
                                            into
                                            <select class="media-container-format">
                                                <!-- <option>WebM</option>
                                                <option disabled>Mp4</option> -->
                                                <option>WAV</option>
                                                <!-- <option disabled>Ogg</option> -->
                                                <!-- <option>Gif</option> -->
                                            </select>
                            
                                            <button>Start Recording</button>
                                        </h2>
                            
                                        <div style="text-align: center; display: none;">
                                            <button id="save-to-disk">Save To Disk</button>
                                            <button id="open-new-tab">Open New Tab</button>
                                            <button id="upload-to-server">Upload To Server</button>
                                        </div>
                            
                                        <br>
                            
                                        <video controls playsinline autoplay muted=false volume=1></video>
                                    </section>
                            
                                    <script>
                                        (function() {
                                            var params = {},
                                                r = /([^&=]+)=?([^&]*)/g;
                            
                                            function d(s) {
                                                return decodeURIComponent(s.replace(/\+/g, ' '));
                                            }
                            
                                            var match, search = window.location.search;
                                            while (match = r.exec(search.substring(1))) {
                                                params[d(match[1])] = d(match[2]);
                            
                                                if(d(match[2]) === 'true' || d(match[2]) === 'false') {
                                                    params[d(match[1])] = d(match[2]) === 'true' ? true : false;
                                                }
                                            }
                            
                                            window.params = params;
                                        })();
                                    </script>
                            
                                    <script>
                                        var recordingDIV = document.querySelector('.recordrtc');
                                        var recordingMedia = recordingDIV.querySelector('.recording-media');
                                        var recordingPlayer = recordingDIV.querySelector('video');
                                        var mediaContainerFormat = recordingDIV.querySelector('.media-container-format');
                            
                                        recordingDIV.querySelector('button').onclick = function() {
                                            var button = this;
                            
                                            if(button.innerHTML === 'Stop Recording') {
                                                button.disabled = true;
                                                button.disableStateWaiting = true;
                                                setTimeout(function() {
                                                    button.disabled = false;
                                                    button.disableStateWaiting = false;
                                                }, 2 * 1000);
                            
                                                button.innerHTML = 'Start Recording';
                            
                                                function stopStream() {
                                                    if(button.stream && button.stream.stop) {
                                                        button.stream.stop();
                                                        button.stream = null;
                                                    }
                                                }
                            
                                                if(button.recordRTC) {
                                                    if(button.recordRTC.length) {
                                                        button.recordRTC[0].stopRecording(function(url) {
                                                            if(!button.recordRTC[1]) {
                                                                button.recordingEndedCallback(url);
                                                                stopStream();
                            
                                                                saveToDiskOrOpenNewTab(button.recordRTC[0]);
                                                                return;
                                                            }
                            
                                                            button.recordRTC[1].stopRecording(function(url) {
                                                                button.recordingEndedCallback(url);
                                                                stopStream();
                                                            });
                                                        });
                                                    }
                                                    else {
                                                        button.recordRTC.stopRecording(function(url) {
                                                            button.recordingEndedCallback(url);
                                                            stopStream();
                            
                                                            saveToDiskOrOpenNewTab(button.recordRTC);
                                                        });
                                                    }
                                                }
                            
                                                return;
                                            }
                            
                                            button.disabled = true;
                            
                                            var commonConfig = {
                                                onMediaCaptured: function(stream) {
                                                    button.stream = stream;
                                                    if(button.mediaCapturedCallback) {
                                                        button.mediaCapturedCallback();
                                                    }
                            
                                                    button.innerHTML = 'Stop Recording';
                                                    button.disabled = false;
                                                },
                                                onMediaStopped: function() {
                                                    button.innerHTML = 'Start Recording';
                            
                                                    if(!button.disableStateWaiting) {
                                                        button.disabled = false;
                                                    }
                                                },
                                                onMediaCapturingFailed: function(error) {
                                                    if(error.name === 'PermissionDeniedError' && !!navigator.mozGetUserMedia) {
                                                        InstallTrigger.install({
                                                            'Foo': {
                                                                // https://addons.mozilla.org/firefox/downloads/latest/655146/addon-655146-latest.xpi?src=dp-btn-primary
                                                                URL: 'https://addons.mozilla.org/en-US/firefox/addon/enable-screen-capturing/',
                                                                toString: function () {
                                                                    return this.URL;
                                                                }
                                                            }
                                                        });
                                                    }
                            
                                                    commonConfig.onMediaStopped();
                                                }
                                            };
                            
                                            if(recordingMedia.value === 'record-video') {
                                                captureVideo(commonConfig);
                            
                                                button.mediaCapturedCallback = function() {
                                                    button.recordRTC = RecordRTC(button.stream, {
                                                        type: mediaContainerFormat.value === 'Gif' ? 'gif' : 'video',
                                                        disableLogs: params.disableLogs || false,
                                                        canvas: {
                                                            width: params.canvas_width || 320,
                                                            height: params.canvas_height || 240
                                                        },
                                                        frameInterval: typeof params.frameInterval !== 'undefined' ? parseInt(params.frameInterval) : 20 // minimum time between pushing frames to Whammy (in milliseconds)
                                                    });
                            
                                                    button.recordingEndedCallback = function(url) {
                                                        recordingPlayer.src = null;
                                                        recordingPlayer.srcObject = null;
                            
                                                        if(mediaContainerFormat.value === 'Gif') {
                                                            recordingPlayer.pause();
                                                            recordingPlayer.poster = url;
                            
                                                            recordingPlayer.onended = function() {
                                                                recordingPlayer.pause();
                                                                recordingPlayer.poster = URL.createObjectURL(button.recordRTC.blob);
                                                            };
                                                            return;
                                                        }
                            
                                                        recordingPlayer.src = url;
                            
                                                        recordingPlayer.onended = function() {
                                                            recordingPlayer.pause();
                                                            recordingPlayer.src = URL.createObjectURL(button.recordRTC.blob);
                                                        };
                                                    };
                            
                                                    button.recordRTC.startRecording();
                                                };
                                            }
                            
                                            if(recordingMedia.value === 'record-audio') {
                                                captureAudio(commonConfig);
                            
                                                button.mediaCapturedCallback = function() {
                                                    button.recordRTC = RecordRTC(button.stream, {
                                                        type: 'audio',
                                                        bufferSize: typeof params.bufferSize == 'undefined' ? 0 : parseInt(params.bufferSize),
                                                        sampleRate: typeof params.sampleRate == 'undefined' ? 44100 : parseInt(params.sampleRate),
                                                        leftChannel: params.leftChannel || false,
                                                        disableLogs: params.disableLogs || false,
                                                        recorderType: DetectRTC.browser.name === 'Edge' ? StereoAudioRecorder : null
                                                    });
                            
                                                    button.recordingEndedCallback = function(url) {
                                                        var audio = new Audio();
                                                        audio.src = url;
                                                        audio.controls = true;
                                                        recordingPlayer.parentNode.appendChild(document.createElement('hr'));
                                                        recordingPlayer.parentNode.appendChild(audio);
                            
                                                        if(audio.paused) audio.play();
                            
                                                        audio.onended = function() {
                                                            audio.pause();
                                                            audio.src = URL.createObjectURL(button.recordRTC.blob);
                                                        };
                                                    };
                            
                                                    button.recordRTC.startRecording();
                                                };
                                            }
                            
                                            if(recordingMedia.value === 'record-audio-plus-video') {
                                                captureAudioPlusVideo(commonConfig);
                            
                                                button.mediaCapturedCallback = function() {
                            
                                                    if(DetectRTC.browser.name !== 'Firefox') { // opera or chrome etc.
                                                        button.recordRTC = [];
                            
                                                        if(!params.bufferSize) {
                                                            // it fixes audio issues whilst recording 720p
                                                            params.bufferSize = 16384;
                                                        }
                            
                                                        var audioRecorder = RecordRTC(button.stream, {
                                                            type: 'audio',
                                                            bufferSize: typeof params.bufferSize == 'undefined' ? 0 : parseInt(params.bufferSize),
                                                            sampleRate: typeof params.sampleRate == 'undefined' ? 44100 : parseInt(params.sampleRate),
                                                            leftChannel: params.leftChannel || false,
                                                            disableLogs: params.disableLogs || false,
                                                            recorderType: DetectRTC.browser.name === 'Edge' ? StereoAudioRecorder : null
                                                        });
                            
                                                        
                            
                                                        // to sync audio/video playbacks in browser!
                                                        videoRecorder.initRecorder(function() {
                                                            audioRecorder.initRecorder(function() {
                                                                audioRecorder.startRecording();
                                                                videoRecorder.startRecording();
                                                            });
                                                        });
                            
                                                        button.recordRTC.push(audioRecorder, videoRecorder);
                            
                                                        button.recordingEndedCallback = function() {
                                                            var audio = new Audio();
                                                            audio.src = audioRecorder.toURL();
                                                            audio.controls = true;
                                                            audio.autoplay = true;
                            
                                                            audio.onloadedmetadata = function() {
                                                                recordingPlayer.src = videoRecorder.toURL();
                                                            };
                            
                                                            recordingPlayer.parentNode.appendChild(document.createElement('hr'));
                                                            recordingPlayer.parentNode.appendChild(audio);
                            
                                                            if(audio.paused) audio.play();
                                                        };
                                                        return;
                                                    }
                            
                            
                                                    button.recordingEndedCallback = function(url) {
                                                        recordingPlayer.srcObject = null;
                                                        recordingPlayer.muted = false;
                                                        recordingPlayer.src = url;
                            
                                                        recordingPlayer.onended = function() {
                                                            recordingPlayer.pause();
                                                            recordingPlayer.src = URL.createObjectURL(button.recordRTC.blob);
                                                        };
                                                    };
                            
                                                    button.recordRTC.startRecording();
                                                };
                                            }
                            
                                            if(recordingMedia.value === 'record-screen') {
                                                captureScreen(commonConfig);
                            
                                                button.mediaCapturedCallback = function() {
                                                    button.recordRTC = RecordRTC(button.stream, {
                                                        type: mediaContainerFormat.value === 'Gif' ? 'gif' : 'video',
                                                        disableLogs: params.disableLogs || false,
                                                        canvas: {
                                                            width: params.canvas_width || 320,
                                                            height: params.canvas_height || 240
                                                        }
                                                    });
                            
                                                    button.recordingEndedCallback = function(url) {
                                                        recordingPlayer.src = null;
                                                        recordingPlayer.srcObject = null;
                            
                                                        if(mediaContainerFormat.value === 'Gif') {
                                                            recordingPlayer.pause();
                                                            recordingPlayer.poster = url;
                                                            recordingPlayer.onended = function() {
                                                                recordingPlayer.pause();
                                                                recordingPlayer.poster = URL.createObjectURL(button.recordRTC.blob);
                                                            };
                                                            return;
                                                        }
                            
                                                        recordingPlayer.src = url;
                                                    };
                            
                                                    button.recordRTC.startRecording();
                                                };
                                            }
                            
                                            if(recordingMedia.value === 'record-audio-plus-screen') {
                                                captureAudioPlusScreen(commonConfig);
                            
                                                button.mediaCapturedCallback = function() {
                                                    
                            
                                                    button.recordingEndedCallback = function(url) {
                                                        recordingPlayer.srcObject = null;
                                                        recordingPlayer.muted = false;
                                                        recordingPlayer.src = url;
                            
                                                        recordingPlayer.onended = function() {
                                                            recordingPlayer.pause();
                                                            recordingPlayer.src = URL.createObjectURL(button.recordRTC.blob);
                                                        };
                                                    };
                            
                                                    button.recordRTC.startRecording();
                                                };
                                            }
                                        };
                            
                                        function captureVideo(config) {
                                            captureUserMedia({video: true}, function(videoStream) {
                                                recordingPlayer.srcObject = videoStream;
                            
                                                config.onMediaCaptured(videoStream);
                            
                                                videoStream.onended = function() {
                                                    config.onMediaStopped();
                                                };
                                            }, function(error) {
                                                config.onMediaCapturingFailed(error);
                                            });
                                        }
                            
                                        function captureAudio(config) {
                                            captureUserMedia({audio: true}, function(audioStream) {
                                                recordingPlayer.srcObject = audioStream;
                            
                                                config.onMediaCaptured(audioStream);
                            
                                                audioStream.onended = function() {
                                                    config.onMediaStopped();
                                                };
                                            }, function(error) {
                                                config.onMediaCapturingFailed(error);
                                            });
                                        }
                            
                                        function captureAudioPlusVideo(config) {
                                            captureUserMedia({video: true, audio: true}, function(audioVideoStream) {
                                                recordingPlayer.srcObject = audioVideoStream;
                            
                                                config.onMediaCaptured(audioVideoStream);
                            
                                                audioVideoStream.onended = function() {
                                                    config.onMediaStopped();
                                                };
                                            }, function(error) {
                                                config.onMediaCapturingFailed(error);
                                            });
                                        }
                            
                                        function captureScreen(config) {
                                            getScreenId(function(error, sourceId, screenConstraints) {
                                                if (error === 'not-installed') {
                                                    document.write('<h1><a target="_blank" href="https://chrome.google.com/webstore/detail/screen-capturing/ajhifddimkapgcifgcodmmfdlknahffk">Please install this chrome extension then reload the page.</a></h1>');
                                                }
                            
                                                if (error === 'permission-denied') {
                                                    alert('Screen capturing permission is denied.');
                                                }
                            
                                                if (error === 'installed-disabled') {
                                                    alert('Please enable chrome screen capturing extension.');
                                                }
                            
                                                if(error) {
                                                    config.onMediaCapturingFailed(error);
                                                    return;
                                                }
                            
                                                captureUserMedia(screenConstraints, function(screenStream) {
                                                    recordingPlayer.srcObject = screenStream;
                            
                                                    config.onMediaCaptured(screenStream);
                            
                                                    screenStream.onended = function() {
                                                        config.onMediaStopped();
                                                    };
                                                }, function(error) {
                                                    config.onMediaCapturingFailed(error);
                                                });
                                            });
                                        }
                            
                                        function captureAudioPlusScreen(config) {
                                            getScreenId(function(error, sourceId, screenConstraints) {
                                                if (error === 'not-installed') {
                                                    document.write('<h1><a target="_blank" href="https://chrome.google.com/webstore/detail/screen-capturing/ajhifddimkapgcifgcodmmfdlknahffk">Please install this chrome extension then reload the page.</a></h1>');
                                                }
                            
                                                if (error === 'permission-denied') {
                                                    alert('Screen capturing permission is denied.');
                                                }
                            
                                                if (error === 'installed-disabled') {
                                                    alert('Please enable chrome screen capturing extension.');
                                                }
                            
                                                if(error) {
                                                    config.onMediaCapturingFailed(error);
                                                    return;
                                                }
                            
                                                screenConstraints.audio = true;
                            
                                                captureUserMedia(screenConstraints, function(screenStream) {
                                                    recordingPlayer.srcObject = screenStream;
                            
                                                    config.onMediaCaptured(screenStream);
                            
                                                    screenStream.onended = function() {
                                                        config.onMediaStopped();
                                                    };
                                                }, function(error) {
                                                    config.onMediaCapturingFailed(error);
                                                });
                                            });
                                        }
                            
                                        function captureUserMedia(mediaConstraints, successCallback, errorCallback) {
                                            navigator.mediaDevices.getUserMedia(mediaConstraints).then(successCallback).catch(errorCallback);
                                        }
                            
                                        function setMediaContainerFormat(arrayOfOptionsSupported) {
                                            var options = Array.prototype.slice.call(
                                                mediaContainerFormat.querySelectorAll('option')
                                            );
                            
                                            var selectedItem;
                                            options.forEach(function(option) {
                                                option.disabled = true;
                            
                                                if(arrayOfOptionsSupported.indexOf(option.value) !== -1) {
                                                    option.disabled = false;
                            
                                                    if(!selectedItem) {
                                                        option.selected = true;
                                                        selectedItem = option;
                                                    }
                                                }
                                            });
                                        }
                            
                                        recordingMedia.onchange = function() {
                                            if(this.value === 'record-audio') {
                                                setMediaContainerFormat(['WAV', 'Ogg']);
                                                return;
                                            }
                                            setMediaContainerFormat(['WebM', /*'Mp4',*/ 'Gif']);
                                        };
                            
                                        if(DetectRTC.browser.name === 'Edge') {
                                            // webp isn't supported in Microsoft Edge
                                            // neither MediaRecorder API
                                            // so lets disable both video/screen recording options
                            
                                            console.warn('Neither MediaRecorder API nor webp is supported in Microsoft Edge. You cam merely record audio.');
                            
                                            recordingMedia.innerHTML = '<option value="record-audio">Audio</option>';
                                            setMediaContainerFormat(['WAV']);
                                        }
                            
                                        if(DetectRTC.browser.name === 'Firefox') {
                                            // Firefox implemented both MediaRecorder API as well as WebAudio API
                                            // Their MediaRecorder implementation supports both audio/video recording in single container format
                                            // Remember, we can't currently pass bit-rates or frame-rates values over MediaRecorder API (their implementation lakes these features)
                            
                                            recordingMedia.innerHTML = '<option value="record-audio-plus-video">Audio+Video</option>'
                                                                        + '<option value="record-audio-plus-screen">Audio+Screen</option>'
                                                                        + recordingMedia.innerHTML;
                                        }
                            
                                        // disabling this option because currently this demo
                                        // doesn't supports publishing two blobs.
                                        // todo: add support of uploading both WAV/WebM to server.
                                        if(false && DetectRTC.browser.name === 'Chrome') {
                                            recordingMedia.innerHTML = '<option value="record-audio-plus-video">Audio+Video</option>'
                                                                        + recordingMedia.innerHTML;
                                            console.info('This RecordRTC demo merely tries to playback recorded audio/video sync inside the browser. It still generates two separate files (WAV/WebM).');
                                        }
                            
                                        var MY_DOMAIN = 'webrtc-experiment.com';
                            
                                        function isMyOwnDomain() {
                                            // replace "webrtc-experiment.com" with your own domain name
                                            return document.domain.indexOf(MY_DOMAIN) !== -1;
                                        }
                            
                                        function saveToDiskOrOpenNewTab(recordRTC) {
                                            recordingDIV.querySelector('#save-to-disk').parentNode.style.display = 'block';
                                            recordingDIV.querySelector('#save-to-disk').onclick = function() {
                                                if(!recordRTC) return alert('No recording found.');
                            
                                                recordRTC.save();
                                            };
                            
                                            recordingDIV.querySelector('#open-new-tab').onclick = function() {
                                                if(!recordRTC) return alert('No recording found.');
                            
                                                window.open(recordRTC.toURL());
                                            };
                            
                                            if(isMyOwnDomain()) {
                                                recordingDIV.querySelector('#upload-to-server').disabled = true;
                                                recordingDIV.querySelector('#upload-to-server').style.display = 'none';
                                            }
                                            else {
                                                recordingDIV.querySelector('#upload-to-server').disabled = false;
                                            }
                                            
                                            recordingDIV.querySelector('#upload-to-server').onclick = function() {
                                                if(isMyOwnDomain()) {
                                                    alert('PHP Upload is not available on this domain.');
                                                    return;
                                                }
                            
                                                if(!recordRTC) return alert('No recording found.');
                                                this.disabled = true;
                            
                                                var button = this;
                                                uploadToServer(recordRTC, function(progress, fileURL) {
                                                    if(progress === 'ended') {
                                                        button.disabled = false;
                                                        button.innerHTML = 'Click to download from server';
                                                        button.onclick = function() {
                                                            window.open(fileURL);
                                                        };
                                                        return;
                                                    }
                                                    button.innerHTML = progress;
                                                });
                                            };
                                        }
                            
                                        var listOfFilesUploaded = [];
                            
                                        function uploadToServer(recordRTC, callback) {
                                            var blob = recordRTC instanceof Blob ? recordRTC : recordRTC.blob;
                                            var fileType = blob.type.split('/')[0] || 'audio';
                                            var fileName = (Math.random() * 1000).toString().replace('.', '');
                            
                                            if (fileType === 'audio') {
                                                fileName += '.' + (!!navigator.mozGetUserMedia ? 'ogg' : 'wav');
                                            } else {
                                                fileName += '.webm';
                                            }
                            
                                            // create FormData
                                            var formData = new FormData();
                                            formData.append(fileType + '-filename', fileName);
                                            formData.append(fileType + '-blob', blob);
                            
                                            callback('Uploading ' + fileType + ' recording to server.');
                            
                                            // var upload_url = 'https://your-domain.com/files-uploader/';
                                            var upload_url = 'save.php';
                            
                                            // var upload_directory = upload_url;
                                            var upload_directory = 'uploads/';
                            
                                            makeXMLHttpRequest(upload_url, formData, function(progress) {
                                                if (progress !== 'upload-ended') {
                                                    callback(progress);
                                                    return;
                                                }
                            
                                                callback('ended', upload_directory + fileName);
                            
                                                // to make sure we can delete as soon as visitor leaves
                                                listOfFilesUploaded.push(upload_directory + fileName);
                                            });
                                        }
                            
                                        function makeXMLHttpRequest(url, data, callback) {
                                            var request = new XMLHttpRequest();
                                            request.onreadystatechange = function() {
                                                if (request.readyState == 4 && request.status == 200) {
                                                    callback('upload-ended');
                                                }
                                            };
                            
                                            request.upload.onloadstart = function() {
                                                callback('Upload started...');
                                            };
                            
                                            request.upload.onprogress = function(event) {
                                                callback('Upload Progress ' + Math.round(event.loaded / event.total * 100) + "%");
                                            };
                            
                                            request.upload.onload = function() {
                                                callback('progress-about-to-end');
                                            };
                            
                                            request.upload.onload = function() {
                                                callback('progress-ended');
                                            };
                            
                                            request.upload.onerror = function(error) {
                                                callback('Failed to upload to server');
                                                console.error('XMLHttpRequest failed', error);
                                            };
                            
                                            request.upload.onabort = function(error) {
                                                callback('Upload aborted.');
                                                console.error('XMLHttpRequest aborted', error);
                                            };
                            
                                            request.open('POST', url);
                                            request.send(data);
                                        }
                            
                                        window.onbeforeunload = function() {
                                            recordingDIV.querySelector('button').disabled = false;
                                            recordingMedia.disabled = false;
                                            mediaContainerFormat.disabled = false;
                            
                                            if(!listOfFilesUploaded.length) return;
                            
                                            var delete_url = 'https://webrtcweb.com/f/delete.php';
                                            // var delete_url = 'RecordRTC-to-PHP/delete.php';
                            
                                            listOfFilesUploaded.forEach(function(fileURL) {
                                                var request = new XMLHttpRequest();
                                                request.onreadystatechange = function() {
                                                    if (request.readyState == 4 && request.status == 200) {
                                                        if(this.responseText === ' problem deleting files.') {
                                                            alert('Failed to delete ' + fileURL + ' from the server.');
                                                            return;
                                                        }
                            
                                                        listOfFilesUploaded = [];
                                                        alert('You can leave now. Your files are removed from the server.');
                                                    }
                                                };
                                                request.open('POST', delete_url);
                            
                                                var formData = new FormData();
                                                formData.append('delete-file', fileURL.split('/').pop());
                                                request.send(formData);
                                            });
                            
                                            return 'Please wait few seconds before your recordings are deleted from the server.';
                                        };
                                    </script>
                            
                                    <!-- <section class="experiment own-widgets">
                                        <h2 class="header" id="updates" style="color: red; padding-bottom: .1em;"><a href="https://github.com/muaz-khan/RecordRTC/issues" target="_blank">RecordRTC Issues</a>
                                        </h2>
                                        <div id="github-issues"></div>
                                    </section>
                            
                                    <section class="experiment">
                                        <h2 class="header" id="feedback">Feedback</h2>
                                        <div>
                                            <textarea id="message" style="border: 1px solid rgb(189, 189, 189); height: 8em; margin: .2em; outline: none; resize: vertical; width: 98%;" placeholder="Have any message? Suggestions or something went wrong?"></textarea>
                                        </div>
                                        <button id="send-message" style="font-size: 1em;">Send Message</button>
                                        <small style="margin-left: 1em;">Enter your email too; if you want "direct" reply!</small>
                                    </section>
                            
                                    <section class="experiment">
                                        <p style="margin-top: 0;">
                                            RecordRTC is MIT licensed on Github! <a href="https://github.com/muaz-khan/RecordRTC" target="_blank">Documentation</a>
                                        </p>
                                    </section>
                            
                                    <section class="experiment own-widgets latest-commits">
                                        <h2 class="header" id="updates" style="color: red; padding-bottom: .1em;"><a href="https://github.com/muaz-khan/RecordRTC/commits/master" target="_blank">Latest Updates</a>
                                        </h2>
                                        <div id="github-commits"></div>
                                    </section> -->
                                </article>
                            
                                <!-- <a href="https://github.com/muaz-khan/RecordRTC" class="fork-left"></a>
                            
                                <footer>
                                    <p>
                                        <a href="https://www.webrtc-experiment.com/">WebRTC Experiments</a> © <a href="https://MuazKhan.com" rel="author" target="_blank">Muaz Khan</a>
                                        <a href="mailto:muazkh@gmail.com" target="_blank">muazkh@gmail.com</a>
                                    </p>
                                </footer> -->
                            
                                <!-- commits.js is useless for you! -->
                                <script>
                                    window.useThisGithubPath = 'muaz-khan/RecordRTC';
                                </script>
                                <script src="https://www.webrtc-experiment.com/commits.js" async></script>
                        </div>
                     
                    </div>
                    
                </div>
            </div> <!-- end col -->
        </div>

        <hr class="mt-2 mb-5">

        <div class="row text-center text-lg-left">
            @foreach($group->mediaGroup as $mediaGroupFile)
            @foreach($mediaGroupFile->mediaa as $file)
            @if($file->type == "file")
                <div class="col-lg-3 col-md-4 col-6 text-center">
                        <embed class="" src="{{asset('assets/files/Media/'.$file->url)}}"  frameBorder="0" scrolling="auto" height="300px"/>
                        <a href="{{asset('assets/files/Media/'.$file->url)}}" target="_blank" class="d-block mb-4 h-100">عرض </a>
                </div>
                {{-- <div class="modal fade bd-example-modal-lg" id="images{{$image->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content" style="background: rgba(0,0,0,0);border: none">
                        <div class="modal-body" >
                            <div class="group-img-container text-center post-modal">
                                <img  src="{{asset('assets/images/Media')}}/{{$image->url}}" alt="" class="group-img img-fluid " ><br>
                            </div>
                        </div>
                        </div>
                    </div>
                </div> --}}
            @endif
            @endforeach
            @endforeach
       
        </div>

    </div>
    <!-- /.container -->
</div>

 