class ApplicationController < ActionController::Base
#  protect_from_forgery with: :null_session

#  rescue_from ActionController::RoutingError,  with: lambda { |e| render_error(e, 404, "Not Found") }
#  rescue_from ActiveRecord::RecordNotFound, with: lambda { |e| render_error(e, 404, "Not Found") }

#  def routing_error
#    raise ActionController::RoutingError, params[:path]
#  end

#  def render_error(e, status, message)
#    @status= status
#    @message= message
#    if request.format.to_sym == :json
#      render json: { error: 'error' }, status: :internal_server_error
#    else
#      render template: "layouts/error", status: 500
#    end
#  end

end
